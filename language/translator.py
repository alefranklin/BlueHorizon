import json

#creo il vettore di chiavi non uniche
chiavi = []
for line in open("chiavi.txt"):
    l = line.rstrip('\n')
    try:
        chiavi.index(l)
    except ValueError:
        chiavi.append(l)
#ok
#carico i json
f_it = open("it.json", "r+")
raw = f_it.read()
it = json.loads(raw)

f_en = open("en.json", "r+")
raw = f_en.read()
en = json.loads(raw)

#creo il file
ftxt = open("mancanti.txt", "r+")
for k in chiavi:
    found_it = False
    found_en = False

    if k in it:
        found_it = True
    if k in en:
        found_en = True

    if(not (found_it and found_en)):
        ftxt.write("CHIAVE="+k+"\n")

    if found_it:
        ftxt.write("ITA="+it[k]+"\n")
    else:
        ftxt.write("ITA=\n")

    if found_en:
        ftxt.write("ENG="+en[k]+"\n")
    else:
        ftxt.write("ENG=\n")

    ftxt.write("\n\n\n\n\n\n")

f_it.close()
f_en.close()
ftxt.close()
