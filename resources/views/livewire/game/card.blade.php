<div
    class="transition-all group cursor-pointer hover:bg-neutral-950 hover:ring-1 rounded-xl ring-pink-700 p-4 hover:p-6 flex flex-col gap-2 h-72 w-56">
    <figure class="relative w-full h-1/2 flex flex-col gap-1 justify-start items-start">
        @if ($deal['savings'] > 0)
            <span
                class="absolute transition-all scale-110 group-hover:translate-x-1/3 group-hover:scale-100 top-0 right-0 rounded-full bg-red-600 h-12 w-12 translate-x-1/2 -translate-y-1/3 text-center flex justify-center items-center"
                style="font-size: .6rem"> {{ ceil($deal['savings']) }}%off</span>
        @endif
        <img class="w-full  overflow-hidden" src={{ $deal['thumb'] }} />
        <figcaption class="font-bold">{{ $deal['title'] }}</figcaption>
    </figure>
    <div class=" h-1/2 flex flex-col justify-between items-center">
        <p>Steam Review</p>
        <div class="flex flex-row w-full justify-around text-2xl font-bold text-yellow-500  brightness-110">
            @for ($i = 0; $i < floor($deal['steamRatingPercent'] / 20); $i++)
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                        clip-rule="evenodd" />
                </svg>
            @endfor
            @for ($i = 0; $i < 5 - floor($deal['steamRatingPercent'] / 20); $i++)
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
            @endfor
        </div>
        <span class="w-full transition-all hover:saturate-150 rounded-lg bg-gradient-to-r from-orange-500 via-25% via-pink-600 to-90% to-purple-900 text-center p-2 ">
            <span class="line-through text-sm align-text-top">${{ $deal['normalPrice'] }}</span>
            <span
            >
            ${{ $deal['salePrice'] }}</span>
        </span>
    </div>
</div>
