#not related to the dailythunder one; just a backup for another forum named "hupu.com"

#!C:/Python34 python
import urllib.request 
from bs4 import BeautifulSoup
import re

def crawl(keyurl,keyword,book,number):
    global flag
    req = urllib.request.Request(keyurl,
                                 data =None,
                                 headers = {
    'Connection': 'Keep-Alive',
    'Accept': 'text/html, application/xhtml+xml, */*',
    'Accept-Language': 'en-US,en;q=0.8,zh-Hans-CN;q=0.5,zh-Hans;q=0.3',
    'User-Agent': 'Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; rv:11.0) like Gecko'
    })
    html = urllib.request.urlopen(req)
    bsObj = BeautifulSoup(html,"html.parser")
    words = bsObj.findAll("div",{"class":"fyre-comment"})
    words = bsObj.findAll("p",{})
    words += bsObj.findAll("ul",{})
    setsss=letter_possibility(keyword)
    if words != None:

        for word in words:
            text= ''.join(word.findAll(text=True))
            data = text.strip()
            if data not in book:
                book.append(data)
                for sss in setsss:
                    if str(sss) in data:
                        if "@" not in data:
                            newset.append(data)
                            print (data)
                            #print (len(newset))
                    if len(newset)>=number:
                        flag = 1
                        break
            if flag==1:
                break
    return newset

def letter_possibility(word):

    wordset=[]
    wordset.append(word.upper())
    wordset.append(word.lower())
    wordset.append(word.capitalize())

    return wordset

def findurl(mainurl):
    req = urllib.request.Request(mainurl,
                                 data =None,
                                 headers = {
    'Connection': 'Keep-Alive',
    'Accept': 'text/html, application/xhtml+xml, */*',
    'Accept-Language': 'en-US,en;q=0.8,zh-Hans-CN;q=0.5,zh-Hans;q=0.3',
    'User-Agent': 'Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; rv:11.0) like Gecko'
    })
    html = urllib.request.urlopen(req)
    bsObj = BeautifulSoup(html,"html.parser")
    urlset=[]

    for link in bsObj.findAll("a",{"id":"","href":re.compile(r"dailythunder.com/2016")}):
        if 'href' in link.attrs:
            if link not in urlset:
                urlset.append(link.attrs['href'])
    print ("loading...")
    
    return urlset

def write_into_txt(content):

    txt_first=open("D:\\Documents\\python学习\\little projects\\txt_files\\dailythunder_data.txt","w+")
    txt_first.write(content)


if __name__ == '__main__':

    #txt=open("D:\\xampp\\htdocs\\dailythunder\\keyword.txt")
    #keyword=txt.read()
    #txt.close()
    #txt=open("D:\\xampp\\htdocs\\dailythunder\\num.txt")
    #num=int(txt.read())
    #txt.close()
    keyword=input('please type keyword: ')
    num =30
    page="http://bbs.hupu.com"
    tempset=[]
    book=[]
    newset=[]
    flag=0
    tempset =findurl(page)
    for url in findurl(page):
        #print(url[:-5]+"-"+"1"+".html")
        #print(url)
        for i in range(1,5):
            specialurl=url[:-5]+"-"+str(i)+".html"
            #print(specialurl)
            crawl(specialurl,keyword,book,num)
        #crawl(url,keyword)
    print('Complete!!') 

    #txt=open("D:\\xampp\\htdocs\\dailythunder\\result.txt","w+")
    
