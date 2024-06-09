@extends('templates.index')
@section('content')

<style>
    @media only screen and (max-width: 768px) {
        .mainApp {
            flex-direction: column;
            justify-items: center;
            justify-content: center;
        }

        .mainApp2 {
            justify-items: center;
            justify-content: center;
        }
    }
</style>

<div>
    <div class="px-16 mt-20">
        <div class="w-full">
            <figure class="relative transition-all duration-300">
                <a href="#">
                    <img class="rounded-lg w-full h-80 object-cover brightness-[65%]" src="https://t3.ftcdn.net/jpg/05/14/95/12/360_F_514951224_2dxMLbIw5qNRdPGD003chpbVcxWtcp7K.jpg" alt="image description">
                </a>
                <figcaption class="absolute px-4 text-lg text-white top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                    <p class="font-semibold text-4xl">Teknologi</p>
                    <p class="text-lg mt-5">Memberikan kita kesempatan untuk berkreasi, berinovasi, dan menjelajahi potensi kita yang tak terbatas.</p>
                </figcaption>
            </figure>
        </div>
    </div>
</div>

<div>
    <div class="mt-10">
        <div class="w-full max-w-7xl mx-auto px-5">
            <div class="flex mainApp w-full gap-14">
                <div class="w-full max-w-sm">
                    <form action="" method="get" class="flex items-center mx-auto">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <input type="text" id="simple-search" name="keyword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-5 p-2.5" placeholder="Cari berita menarik" required />
                        </div>
                        <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-black rounded-lg border focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                    <div class="flex flex-col gap-5">
                        <p class="font-bold text-2xl text-black">Kategori</p>
                        <figure class="relative cursor-pointer">
                            <a class="group" href="?kategori=Artificial Intelligence">
                                <img class="rounded-lg w-full h-20 object-cover brightness-50 group-hover:brightness-100 transition-all duration-300" src="https://assets-global.website-files.com/637e5037f3ef83b76dcfc8f9/65c53ea8b480640854254e81_What%20is%20an%20AI%20agent.webp" alt="image description">

                                <figcaption class="absolute px-4 text-lg text-white top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                                    <p class="whitespace-nowrap text-2xl font-semibold">Artificial Intelligence</p>
                                </figcaption>
                            </a>
                        </figure>
                        <figure class="relative cursor-pointer">
                            <a class="group" href="?kategori=Internet of Things">
                                <img class="rounded-lg w-full h-20 object-cover brightness-50 group-hover:brightness-100 transition-all duration-300" src="https://www.linknet.id/files/photos/shares/article/IoT.jpg" alt="image description">

                                <figcaption class="absolute px-4 text-lg text-white top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                                    <p class="whitespace-nowrap text-2xl font-semibold">Internet of Things</p>
                                </figcaption>
                            </a>
                        </figure>
                        <figure class="relative cursor-pointer">
                            <a class="group" href="?kategori=Blockchain">
                                <img class="rounded-lg w-full h-20 object-cover brightness-50 group-hover:brightness-100 transition-all duration-300" src="https://images.alphacoders.com/123/1239282.png" alt="image description">

                                <figcaption class="absolute px-4 text-lg text-white top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                                    <p class="whitespace-nowrap text-2xl font-semibold">Blockchain</p>
                                </figcaption>
                            </a>
                        </figure>
                        <figure class="relative cursor-pointer">
                            <a class="group" href="?kategori=Cybersecurity">
                                <img class="rounded-lg w-full h-20 object-cover brightness-50 group-hover:brightness-100 transition-all duration-300" src="https://asset.kompas.com/crops/NMsVfZAgj2MQaP622gEZ0K-WOnc=/0x0:750x500/1200x800/data/photo/2022/10/07/633fc09b79136.jpg" alt="image description">

                                <figcaption class="absolute px-4 text-lg text-white top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                                    <p class="whitespace-nowrap text-2xl font-semibold">Cybersecurity</p>
                                </figcaption>
                            </a>
                        </figure>
                    </div>
                </div>

                <div class="w-full">
                    <div class="flex flex-wrap mainApp2 gap-y-5 justify-between">
                        @foreach($article as $a)
                        <a href="/detail/{{$a->id ? $a->id : ''}}">
                            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <img class="rounded-t-lg object-cover h-64 w-[382px]" src="{{ $a->cover ? asset('cover_article/' . $a->cover) : ''}}" alt="" />

                                <div class="p-5">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white line-clamp-2 truncate text-balance">{{$a->title ? html_entity_decode($a->title) : ''}}</h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-3 truncate text-balance">{{$a->content ? (strlen($a->content) > 119 ? substr($a->content, 0, 119) . '...' : $a->content) : ''}}</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection