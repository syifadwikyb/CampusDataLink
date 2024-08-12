<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customization;
use App\Models\LinkButton;
use App\Models\SocialButton;
use Illuminate\Support\Facades\Storage;

class CustomizationController extends Controller
{
    public function edit()
    {
        $user_id = auth()->user()->id;
        $customization = Customization::where('user_id', $user_id)->first();
        $socialButtons = SocialButton::where('user_id', $user_id)->get();
        $linkButtons = LinkButton::where('user_id', $user_id)->get();

        if (!$customization) {
            $customization = Customization::create([
                'slug' => '',
                'user_id' => $user_id,
                'banner' => 'banners/bannerPrev.png',
                'profile' => 'profiles/profilePrev.png',
                'title' => 'Title',
                'about' => 'About goes here',
                'display_preview_class' => 'no-scrollbar overflow-y-auto displayPreview  my-auto h-full mb-0 w-full flex-grow-1 rounded-b-2xl bg-white',
                'display_preview_bg' => 'background-image: linear-gradient(to right top, rgb(203, 213, 224), rgb(255, 255, 255)); color: black',
                'display_btn_prop' => 'box',
                'display_btn_style' => 'linear-gradient(45deg, #AAAAAA, #CCCCCC)',
            ]);
        }

        return view('customization.edit', [
            'customization' => $customization,
            'socialButtons' => $socialButtons,
            'linkButtons' => $linkButtons,
        ]);
    }


    // Menampilkan content berdasarkan slug
    public function showContentBySlug($slug)
    {
        $customization = Customization::where('slug', $slug)->firstOrFail(); // Mengambil data customization berdasarkan slug
        $socialButtons = SocialButton::where('user_id', $customization->user_id)->get(); // Mengambil social buttons milik pengguna yang memiliki customization
        $linkButtons = LinkButton::where('user_id', $customization->user_id)->get(); // Mengambil link buttons milik pengguna yang memiliki customization

        // Mengembalikan view 'customization.content' dengan data customization, socialButtons, dan linkButtons
        return view('customization.content', [
            'customization' => $customization,
            'socialButtons' => $socialButtons,
            'linkButtons' => $linkButtons,
        ]);
    }

    // Mengupdate data customization
    public function update(Request $request)
    {
        // Validasi file gambar
        $request->validate([
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mengambil data customization milik pengguna yang sedang login
        $customization = Customization::where('user_id', auth()->user()->id)->firstOrFail();

        // Menangani update banner
        if ($request->hasFile('banner')) {
            if ($customization->banner) {
                Storage::disk('public')->delete($customization->banner); // Menghapus file lama jika ada
            }

            $bannerPath = $request->file('banner')->store('banners', 'public'); // Menyimpan file banner dan mendapatkan path-nya
            $customization->banner = $bannerPath; // Menyimpan path banner ke model
        }

        // Menangani update profile
        if ($request->hasFile('profile')) {
            if ($customization->profile) {
                Storage::disk('public')->delete($customization->profile); // Menghapus file lama jika ada
            }

            $profilePath = $request->file('profile')->store('profiles', 'public'); // Menyimpan file profile dan mendapatkan path-nya
            $customization->profile = $profilePath; // Menyimpan path profile ke model
        }

        // Update other fields
        $customization->slug = $request->input('slug_input', $customization->slug);
        $customization->title = $request->input('title_input', $customization->title);
        $customization->about = $request->input('about_input', $customization->about);
        $customization->display_preview_class = $request->input('display_preview_class', $customization->display_preview_class);
        $customization->display_preview_bg = $request->input('display_preview_bg', $customization->display_preview_bg);
        $customization->display_btn_style = $request->input('btnstyle_input', $customization->display_btn_style);
        $customization->display_btn_prop = $request->input('btnprops_input', $customization->display_btn_prop);
        $customization->save();

        // Menangani update social buttons
        SocialButton::where('user_id', auth()->user()->id)->delete(); // Menghapus social buttons lama
        if ($request->has('socialButtons')) {
            foreach ($request->input('socialButtons') as $socialButton) {
                SocialButton::create([
                    'user_id' => auth()->user()->id,
                    'url' => $socialButton['url'],
                    'icon' => $socialButton['icon'],
                ]); // Menyimpan social button baru
            }
        }

        // Menangani update link buttons
        LinkButton::where('user_id', auth()->user()->id)->delete(); // Menghapus link buttons lama
        if ($request->has('linkButtons')) {
            foreach ($request->input('linkButtons') as $linkButton) {
                LinkButton::create([
                    'user_id' => auth()->user()->id,
                    'url' => $linkButton['url'],
                    'text' => $linkButton['text'],
                ]); // Menyimpan link button baru
            }
        }

        // Redirect ke route 'customization.home'
        return redirect()->route('customization.home');
    }
}
