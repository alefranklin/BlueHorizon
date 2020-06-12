import json

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

# ricreo il dizionario aggiornato
it = {}
en = {}
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

# salvo le nuove traduzioni
with open("it.json", "r+") as f_it:
    f_it.seek(0)
    json.dump(it, f_it)
    f_it.truncate()

with open("en.json", "r+") as f_en:
    f_en.seek(0)
    json.dump(en, f_en)
    f_en.truncate()
