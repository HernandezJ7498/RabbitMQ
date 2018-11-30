import mysql.connector
import configparser
import tarfile
import os

Config = configparser.ConfigParser()

Config.read("package.ini")

Config.sections()
['frontEndPackage', 'backEndPackage', 'DMZPackage']

cnx = mysql.connector.connect(user='test', password='4321Password.',
                              host='192.168.0.11',
                              database='deployment')

def ConfigSectionMap(section):
    dict1 = {}
    options = Config.options(section)
    for option in options:
        try:
            dict1[option] = Config.get(section, option)
            if dict1[option] == -1:
                DebugPrint("skip: %s" % option)
        except:
            print("exception on %s!" % option)
            dict1[option] = None
    return dict1

print("You can make a package for:")

for sections in Config.sections():
    print(sections)

selection = input("\n Enter a package name to build: ")
directory = input("Enter your working directory e.g /home/directory/: \n")


mycursor = cnx.cursor()

mycursor.execute("SELECT version FROM versions WHERE type='" + selection + "'")

latest = mycursor.fetchall()

versions=[]
for version in latest:
    versions.append(version[0])
    print(versions)

prevVersion = max(versions)

newVersion = prevVersion + 1

sql = "INSERT INTO versions (filename, type, version) VALUES (%s, %s, %s)"
val = (selection + str(newVersion) + ".tar.gz", selection, newVersion)
mycursor.execute(sql, val)
cnx.commit()

tar = tarfile.open(selection + str(newVersion) + ".tar.gz", "w:gz")
for files in ConfigSectionMap(selection):
    tar.add(files)
tar.close()

os.system("scp " + selection + str(newVersion) + ".tar.gz linux490@192.168.0.11:/home")