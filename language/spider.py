import re
import os
import fnmatch
import json

# inizializzo array di file da analizzare
file_net = []

# trovo tutti i file nel sito che potrebbero contenere delle traduzioni
for path,dirs,files in os.walk('../'):
    for f in fnmatch.filter(files,'*.php'):
        fullname = os.path.abspath(os.path.join(path,f))
        file_net.append(fullname)
        #print(fullname) # debug

# analizzo i file
chiavi = []
for fn in file_net:
    with open(fn, "r") as f:
        text = f.read()

        # la regex magica che mi sgama tutte le chiavi
        m = re.findall(r'tr\(\"(.+?)\"\)', text)
        if m:
            chiavi += m

# aggiungo eventuali chiavi mancanti
for line in open("chiavi.txt"):
    l = line.rstrip('\n')
    chiavi.append(l)

#carico i json
with open("it.json", "r+") as f_it:
    raw = f_it.read()
    it = json.loads(raw)

with open("en.json", "r+") as f_en:
    raw = f_en.read()
    en = json.loads(raw)

# aggiungo le chiavi esistenti
chiavi += it.keys()
chiavi += en.keys()

# potrebbe esserci dei doppioni che devo eliminare
# pythonic way
tmp = set(chiavi)
chiavi = list(tmp)

print("trovate "+str(len(chiavi))+" chiavi")

# creo il file per fare la traduzione
with open("mancanti.txt", "w") as ftxt:
    #creo il file
    for k in chiavi:
        # printo la chiave
        ftxt.write("CHIAVE="+k+"\n")

        # se la traduzione esiste la stampo
        if k in it:
            ftxt.write("ITA="+it[k]+"\n")
        else:
            ftxt.write("ITA=\n")

        # se la traduzione esiste la stampo
        if k in en:
            ftxt.write("ENG="+en[k]+"\n")
        else:
            ftxt.write("ENG=\n")

        ftxt.write("\n\n\n\n")

print("completa il file mancanti.txt e poi lancia updater.py")
print("good job :)")
