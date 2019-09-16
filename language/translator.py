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
found_it = False
found_en = False
for k in chiavi:

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


"""

key = ""
while (1):
    print("\n\n\n\n\n\n\n\n\n\n")
    print("premi x per uscire")
    print("premi . se la chiave e gia nella lingua della traduzione")
    key = raw_input('inserisci la chiave: ')
    print(key)
    if(key == "x"):
        break
    value_it = raw_input("traduzione italiana: ")
    valeu_en = raw_input("traduzione inglese: ")

    if(value_it == "."):
        it[key] = key
    else:
        it[key] = value_it

    if(valeu_en == "."):
        en[key] = key
    else:
        en[key] = valeu_en


print(it)
print(en)

it_json = json.dumps(it)
en_json = json.dump(en)
"""
