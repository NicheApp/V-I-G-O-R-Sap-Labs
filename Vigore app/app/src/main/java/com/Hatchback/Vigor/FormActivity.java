package com.Hatchback.Vigor;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.Spinner;

import com.Hatchback.Vigor.Login.LoginActivity;

import java.util.ArrayList;
import java.util.List;

public class FormActivity extends AppCompatActivity {
EditText eid,dj,mft;
 RadioButton radioM,radioF,yes,no;
Button submit;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.newform);
        eid=findViewById(R.id.eid);
        dj=findViewById(R.id.jd);

       radioF=findViewById(R.id.radioF);
       radioM=findViewById(R.id.radioM);
        yes=findViewById(R.id.yes);
        no=findViewById(R.id.no);

submit=findViewById(R.id.submit);
        mft=findViewById(R.id.mft);
        final Spinner ctype = (Spinner) findViewById(R.id.sp1);
      // ctype.setOnItemSelectedListener(this);

        // Spinner Drop down elements
        List<String> categories = new ArrayList<String>();
        categories.add("Product");
        categories.add("Service");


        // Creating adapter for spinner
        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, categories);

        // Drop down layout style - list view with radio button
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);

        // attaching data adapter to spinner
        ctype.setAdapter(dataAdapter);


        final Spinner rsc = (Spinner) findViewById(R.id.rsc);
        // ctype.setOnItemSelectedListener(this);

        // Spinner Drop down elements
        List<String> rscs = new ArrayList<String>();
        rscs.add("1 hours");
        rscs.add("2 hours");
        rscs.add("4 hours");
        rscs.add("5 hours");
        rscs.add("6 hours");
        rscs.add("7 hours");
        rscs.add("8 hours");
        rscs.add("9 hours");


        // Creating adapter for spinner
        ArrayAdapter<String> rscadaptaer = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, rscs);

        // Drop down layout style - list view with radio button
        rscadaptaer.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);

        // attaching data adapter to spinner
       rsc.setAdapter(rscadaptaer);

submit.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View v) {
        Intent intent = new Intent(FormActivity.this, MainActivity.class); // Intent to MainActivity
        startActivity(intent);
    }
});

    }
}