package com.collegefinder;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.os.CountDownTimer;
import android.support.v7.app.AppCompatActivity;



public class SplashActivity extends Activity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

               init();
    }

    private void init(){



        new CountDownTimer(5000,1000){
            @Override
            public void onTick(long l) {

            }

            @Override
            public void onFinish() {

                  startActivity(new Intent(SplashActivity.this, Dashboard.class));
                  finish();

            }
        }.start();


    }


}
