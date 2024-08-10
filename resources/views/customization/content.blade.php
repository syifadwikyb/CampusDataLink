<!DOCTYPE html>
<html>

<head>
    <title>{{ $customization->title }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    @vite('resources/css/app.css')
</head>
<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<body class="font-montserrat">
    <div class="{{ $customization->display_preview_class }}" style="{{ $customization->display_preview_bg }}">
        <div class="bg-gray-200 w-[80vh] h-full mx-auto">
            @if ($customization->banner)
                <img class="object-cover h-[190px] w-full" src="{{ asset('storage/' . $customization->banner) }}"
                    alt="Banner">
            @endif
        </div>
        <div class="w-[80vh] h-full mx-auto">
            <div class="w-24 mx-auto bg-gray-600 rounded-full">
                @if ($customization->profile)
                    <img class="object-cover w-24 h-24 -mt-12 rounded-full"
                        src="{{ asset('storage/' . $customization->profile) }}" alt="Profile">
                @endif
            </div>
            <h1 class="mb-2 text-xl font-bold text-center break-words whitespace-normal">{{ $customization->title }}
            </h1>
            <p class="mb-4 text-center break-words whitespace-normal">{{ $customization->about }}</p>
            <div class="flex flex-wrap justify-center p-2 mx-auto space-x-2">
                @foreach ($socialButtons as $socialButton)
                    <div class="mb-2">
                        <a class="{{ $socialButton->icon }}" href="{{ $socialButton->url }}"></a>
                    </div>
                @endforeach
            </div>
            <div id="buttonContainer" class="justify-center w-full px-2 mt-4 text-center">
                @foreach ($linkButtons as $index => $linkButton)
                    <div class="mb-2 link-button-wrapper" 
                        data-id="{{ $index }}">
                        
                            <a href="{{ $linkButton->url }}" class="z-20 mx-auto w-[390px] h-[70px] flex items-center justify-center">
                                <p class="z-20 text-center link-buttons cursor-pointer">{{ $linkButton->text }}</p>
                            </a>
                            <div class="{{ $customization->display_btn_prop }}"
                                style="background: {{ $customization->display_btn_style }}">
                            </div>
                        
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
