import pandas as pd

df = pd.read_excel('meddoor/procs.xlsx')
df = df.dropna()


string_builder = "INSERT INTO `iba11`.`Procedures`(`procedureName`)VALUES("
for i, row in df.iterrows():
    str_ = row['Procs'].strip()
    print (string_builder,"'"+str_+"'",');')