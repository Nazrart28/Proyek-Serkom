try:
    path = input(r"Path: ")
    kunci = int(input("kunci: "))
    print(f"\nFile Path: {path}")
    print(f"Kunci Enkripsi/Deskripsi: {kunci}\n")
    
    file = open(path, 'rb')
    data = file.read()
    file.close()
    
    data = bytearray(data)
    for index, nilai in enumerate(data):
        data[index] = nilai ^ kunci
        
    file = open(path, 'wb')
    file.write(data)
    file.close()
    print(f"\nFile path: {path}")
    print(f"Kunci Enkripsi/Deskripsi: {kunci}\n")   
    
    file = open(path, 'rb')
    data = file.read()
    file.close()
    
    data = bytearray(data)
    for index, nilai in enumerate(data):
        data[index] = nilai ^ kunci
        
    file = open(path, 'wb')
    file.write(data)
    file.close()
    print("Enkripsi/Dekripsi File Selesai \n")
     
except:
    print("Terjadi Kesalahan")