package com.Hatchback.Vigor;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentTransaction;

import android.app.NotificationChannel;
import android.app.NotificationManager;
import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import android.view.MenuItem;
import android.widget.FrameLayout;

import com.Hatchback.Vigor.Home.HomeFragment;
import com.Hatchback.Vigor.Mood.MoodFragment;

import com.Hatchback.Vigor.User.UserFragment;
import com.google.android.material.bottomnavigation.BottomNavigationView;

import java.io.IOException;
import java.io.InputStream;

public class MainActivity extends AppCompatActivity {

    private BottomNavigationView mMainNav;
    private FrameLayout mMainFrame;

    private HomeFragment homeFragment;
    private MoodFragment moodFragment;
    private UserFragment userFragment;
    private static final int QUESTIONNAIRE_REQUEST = 2018;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
//        requestWindowFeature(Window.FEATURE_ACTION_BAR);
//        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);
        setContentView(R.layout.activity_main);

        createNotificationChannel();

        mMainFrame = (FrameLayout) findViewById(R.id.main_frame);
        mMainNav = (BottomNavigationView) findViewById(R.id.main_nav);

        homeFragment = new HomeFragment();
        moodFragment = new MoodFragment();
        userFragment = new UserFragment();


        setFragment(homeFragment);

        mMainNav.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {

                switch (menuItem.getItemId()){
                    case R.id.navBarHome:
                        setFragment(homeFragment);
                        return true;



                    case R.id.navBarMood:
                        setFragment(moodFragment);
                        return true;
                    case R.id.feedback:
                        Intent questions = new Intent(MainActivity.this, QuestionActivity.class);
                        //you have to pass as an extra the json string.
                        questions.putExtra("json_questions", loadQuestionnaireJson("questions_example.json"));
                        startActivityForResult(questions, QUESTIONNAIRE_REQUEST);
                        return true;
                    case R.id.navBarUser:
                        setFragment(userFragment);
                        return true;

                    default:
                        return false;

                }
            }
        });
    }
    private void setFragment(Fragment fragment){
        FragmentTransaction fragmentTransaction = getSupportFragmentManager().beginTransaction();
        fragmentTransaction.replace(R.id.main_frame, fragment);
        fragmentTransaction.commit();
    }

    private void createNotificationChannel(){
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.O){
            CharSequence name = "MeditateChannel";
            String description = "Channel for Meditate Notifications";
            int importance = NotificationManager.IMPORTANCE_DEFAULT;
            NotificationChannel channel = new NotificationChannel("MeditateChannel", name, importance);
            channel.setDescription(description);

            NotificationManager manager = getSystemService(NotificationManager.class);
            manager.createNotificationChannel(channel);
        }
    }
    private String loadQuestionnaireJson(String filename)
    {
        try
        {
            InputStream is = getAssets().open(filename);
            int size = is.available();
            byte[] buffer = new byte[size];
            is.read(buffer);
            is.close();
            return new String(buffer, "UTF-8");
        } catch (IOException ex)
        {
            ex.printStackTrace();
            return null;
        }
    }
}
