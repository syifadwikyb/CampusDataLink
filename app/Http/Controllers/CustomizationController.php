<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customization;
use App\Models\LinkButton;
use App\Models\SocialButton;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class CustomizationController extends Controller
{
    public function edit()
{
    $user = auth()->user();
    $user_id = $user->id;
    $username = $user->name; // Assuming 'name' is the username

    // Attempt to retrieve the customization record, or create it if it doesn't exist
    $customization = Customization::firstOrCreate(
        ['user_id' => $user_id],
        [
            'slug' => $username,
            'banner' => 'banners/bannerPrev.png',
            'profile' => 'profiles/profilePrev.png',
            'title' => 'Title',
            'about' => 'About goes here',
            'display_preview_class' => 'no-scrollbar overflow-y-auto displayPreview my-auto h-full mb-0 w-full flex-grow-1',
            'display_preview_bg' => 'background-image: linear-gradient(to right top, rgb(203, 213, 224), rgb(255, 255, 255)); color: black',
            'display_btn_prop' => 'box',
            'display_btn_style' => 'linear-gradient(45deg, #AAAAAA, #CCCCCC)',
            'display_btn_fontc' => '#000000',
        ]
    );
    // Now fetch the social and link buttons using the newly created or existing customization's ID
    $socialButtons = SocialButton::where('customization_id', $customization->id)->get();
    $linkButtons = LinkButton::where('customization_id', $customization->id)->get();

    return view('customization.edit', [
        'customization' => $customization,
        'socialButtons' => $socialButtons,
        'linkButtons' => $linkButtons,
    ]);
}

    public function showContentBySlug($slug)
    {
        $customization = Customization::where('slug', $slug)->firstOrFail();
        $socialButtons = SocialButton::where('customization_id', $customization->id)->get();
        $linkButtons = LinkButton::where('customization_id', $customization->id)->get();

        return view('customization.content', [
            'customization' => $customization,
            'socialButtons' => $socialButtons,
            'linkButtons' => $linkButtons,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $customization = Customization::where('user_id', auth()->user()->id)->firstOrFail();

        if ($request->hasFile('banner')) {
            if ($customization->banner) {
                Storage::disk('public')->delete($customization->banner);
            }
            $bannerPath = $request->file('banner')->store('banners', 'public');
            $customization->banner = $bannerPath;
        }

        if ($request->hasFile('profile')) {
            if ($customization->profile) {
                Storage::disk('public')->delete($customization->profile);
            }
            $profilePath = $request->file('profile')->store('profiles', 'public');
            $customization->profile = $profilePath;
        }

        $customization->slug = $request->input('slug_input', $customization->slug);
        $customization->title = $request->input('title_input', $customization->title);
        $customization->about = $request->input('about_input', $customization->about);
        $customization->display_preview_class = $request->input('display_preview_class', $customization->display_preview_class);
        $customization->display_preview_bg = $request->input('display_preview_bg', $customization->display_preview_bg);
        $customization->display_btn_style = $request->input('btnstyle_input', $customization->display_btn_style);
        $customization->display_btn_prop = $request->input('btnprops_input', $customization->display_btn_prop);
        $customization->display_btn_fontc = $request->input('btnfontc_input', $customization->display_btn_fontc);
        $customization->save();

        SocialButton::where('customization_id', $customization->id)->delete();
        if ($request->has('socialButtons')) {
            foreach ($request->input('socialButtons') as $socialButton) {
                SocialButton::create([
                    'customization_id' => $customization->id,
                    'url' => $socialButton['url'],
                    'icon' => $socialButton['icon'],
                ]);
            }
        }

        LinkButton::where('customization_id', $customization->id)->delete();
        if ($request->has('linkButtons')) {
            foreach ($request->input('linkButtons') as $linkButton) {
                LinkButton::create([
                    'customization_id' => $customization->id,
                    'url' => $linkButton['url'],
                    'text' => $linkButton['text'],
                ]);
            }
        }

        return redirect()->route('customization.home');
    }

    public function destroy($id)
    {
        $customization = Customization::findOrFail($id);

        // Delete related social buttons
        SocialButton::where('customization_id', $customization->id)->delete();

        // Delete related link buttons
        LinkButton::where('customization_id', $customization->id)->delete();

        // Delete customization itself
        $customization->delete();

        return redirect()->route('customization.home')->with('success', 'Customization and related buttons deleted successfully');
    }
}

