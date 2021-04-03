import os
from zipfile import ZipFile

directory = '/Users/Albaba/Library/Mobile Documents/com~apple~CloudDocs/Coding Workplaces/Repos/Web Programming/midterm'

# create a ZipFile object
zipObj = ZipFile('text_files.zip', 'w')
new_dir = directory + '/text_files'


for filename in os.listdir(directory):
    if filename.endswith(".php") or filename.endswith(".css"): 
        #print(filename)
        #zipObj.write(os.path.join(directory, filename))
    else:
        continue
    
#close zip
zipObj.close()