import datetime
import pandas as pd    
from sklearn.preprocessing import LabelEncoder



import numpy as np
from flask import Flask,request,jsonify,render_template
import pickle

app=Flask(__name__)
model=pickle.load(open('employee_burnout1.pkl','rb'))

df_old=pd.read_csv('test.csv')
df_old['Designation_res']=df_old['Designation'].astype('str')+df_old['Resource Allocation'].astype('str')
l=LabelEncoder()
df_old['Designation_res']=l.fit_transform(df_old['Designation_res'])



@app.route('/')
def home():
    return render_template('index.html')


@app.route('/predict',methods=['POST'])
def predict():
    t2 = request.form['t2']
    t3 = request.form['t3']
    t4 = request.form['t4']
    t5 = request.form['t5']
    t6 = int(request.form['t6'])
    t7 = int(request.form['t7'])
    t8 = float(request.form['t8'])
    df=pd.DataFrame()
    
    df['Date of Joining']=[t2]
    df['Gender']=[t3]
    df['Company Type']=[t4]
    df['WFH Setup Available']=[t5]
    df['Designation']=[t6]
    df['Resource Allocation']=[t7]
    df['Mental Fatigue Score']=[t8]



    
    df['des_res']=df['Designation'].astype('str')+df['Resource Allocation'].astype('str')
    df['Date of Joining']=pd.to_datetime(df['Date of Joining'])


    d=datetime.datetime.now()
    d=pd.to_datetime(d)
    df['experience']=abs(d-df['Date of Joining'])
    df['experience']=(df['experience']/np.timedelta64(1,'M'))

    df['Gender']=df['Gender'].map({"Male":1,"Female":0})
    df['Company Type']=df['Company Type'].map({"Service":1,"Product":0})
    df['WFH Setup Available']=df['WFH Setup Available'].map({"No":1,"Yes":0})


    df['Designation_res']=df['Designation'].astype('str')+df['Resource Allocation'].astype('str')
    df['des_gen_com_mfs']=df.groupby(['Designation','Company Type','Gender'])['Mental Fatigue Score'].transform('mean')
    df['des_gen_mfs']=df.groupby(['Designation','Gender'])['Mental Fatigue Score'].transform('mean')
    df['gen_wfh_mfs']=df.groupby(['Gender','WFH Setup Available'])['Mental Fatigue Score'].transform('mean')


    df['Mfs/des']=df['Mental Fatigue Score']/(df['Designation']+1)
    df['Mfs/res']=df['Mental Fatigue Score']/(df['Resource Allocation']+1)
    print(df)
    
    
    #df['Designation_res']=l.transform(df['Designation_res'])
    df=df.drop(['Gender','Company Type','des_res','Date of Joining'],axis=1)



   # final_features=np.array(df).reshape(1,-1)
    prediction=model.predict(df)
    
    output=prediction[0]
    
    
    return render_template('index.html',prediction_text=output)
        
if __name__=='__main__':
    app.run(debug=True)
    