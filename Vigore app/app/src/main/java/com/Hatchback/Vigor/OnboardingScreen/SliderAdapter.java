package com.Hatchback.Vigor.OnboardingScreen;

import android.view.View;
import android.content.Context;
import androidx.annotation.NonNull;
import androidx.viewpager.widget.PagerAdapter;
import android.view.LayoutInflater;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;
import com.Hatchback.Vigor.R;

public class SliderAdapter extends PagerAdapter {

    Context context;
    LayoutInflater layoutInflater;

    // constructor to pass through the context
    public SliderAdapter(Context context) {

        this.context = context;
    }

    // Array for the slider images
    public int[] slide_images = {
            R.drawable.employees,
            R.drawable.checkleave1,
            R.drawable.meditation_guides,
            R.drawable.mood_tracker,

    };

    // slider headings
    public String[] slide_headings = {
            "WELCOME TO VIGOR \n Team : HatchBack \n Code with Saplabs",
            "Check out Next enjoying events",
            "Meditation Guides",
            "Mood Tracker",

    };

    // slider descriptions
    public String[] slide_description = {
            "A Guide to Happy Employee \n Reduce Your Burnout",
            "Check out next leave, next Salary date, next Bonus ,next appraisal",
            "Breathe and relax! Enjoy our range of meditation guides. Stay calm and mindful.",
            "Keep track of your mood everyday! Meditate shows you your monthly mood summary at a glance.",

    };


    @Override
    public int getCount() {
        return slide_headings.length;
    }

    @Override
    public boolean isViewFromObject(@NonNull View view, @NonNull Object object) {
        return view == (RelativeLayout) object;
    }

    @NonNull
    @Override
    public Object instantiateItem(@NonNull ViewGroup container, int position) {
        layoutInflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        View view = layoutInflater.inflate(R.layout.slide_layout, container, false);

        ImageView slideImageView = (ImageView) view.findViewById(R.id.slide_image);
        TextView slideHeading = (TextView) view.findViewById(R.id.slide_heading);
        TextView slideDescription = (TextView) view.findViewById(R.id.slide_description);

        slideImageView.setImageResource(slide_images[position]);
        slideHeading.setText(slide_headings[position]);
        slideDescription.setText(slide_description[position]);

        container.addView(view);

        return view;
    }

    @Override
    public void destroyItem(@NonNull ViewGroup container, int position, @NonNull Object object) {
        container.removeView((RelativeLayout)object);
    }
}
