import json

#carico i json
f_it = open("it.json", "r+")
raw = f_it.read()
it = json.loads(raw)

f_en = open("en.json", "r+")
raw = f_en.read()
en = json.loads(raw)

chiavi = []
val_it = []
val_en = []
#leggo il file grezzo
for line in open("mancanti.txt"):
    l = line.rstrip('\n')
    if( l != ""):
        #prendo la chiave
        el = l.split("=", 1)
        #controllo che linea e
        if(el[0] == "CHIAVE"):
            chiavi.append(el[-1])
        if(el[0] == "ITA"):
            val_it.append(el[-1])
        if(el[0] == "ENG"):
            val_en.append(el[-1])

#print(chiavi)
#print(val_it)
#print(val_en)

#ok

for i in range(len(chiavi)):

    key = chiavi[i]

    if(val_it[i] == "."):
        it[key] = key
    else:
        it[key] = val_it[i]

    if(val_en[i] == "."):
        en[key] = key
    else:
        en[key] = val_en[i]

#salvo i file
f_it.seek(0)
json.dump(it, f_it)
f_it.truncate()
f_it.close()

f_en.seek(0)
json.dump(en, f_en)
f_en.truncate()
f_en.close()
