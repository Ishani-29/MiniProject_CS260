import random
#("name","roll","10","12","cpi","age","br","aoi","yea","y/n","pack");

company=("Google","Facebook","DeShaw","Uber","Sprinkler","Flipkart","Amazon")
br=("AI","CS","MC","EE")
post=("SDE","Quant","Finance","ML-Engineer","Data-Scientist","Consultant")

sfile = open('out.txt', 'w')

f = open("in.txt", "r")
entry=[]
for i in range(94):
        s=f.readline()
        fi=s.replace(" ","")
        # print(fi,file=sfile)
        en=[]
        s=""
        for c in fi:
            
            if c!="|" :
                    s=s+c
                    # print(s,file=sfile)  
            else:
                en.append(s)
                temp=s
                # print("replace",file=sfile)
                # print(s,file=sfile) 
                s=s.replace(s,"")
                # print(s,file=sfile) 

        entry.append(en)
print("insert into compnay_post values",file=sfile)
for en in entry:
    company=en[1]
    post=en[5]
    cpi=(en[2])
    year=en[4]
    sal=en[3]
    s='("'+company+'","'+post+'",'+sal+','+cpi+',"'+year+'"),'
    print(s,file=sfile)




# s=f.readline()
# f=s.replace(" ","")
# print(f,file=sfile)

