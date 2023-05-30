<x-layout>
    <body>
        
    <main id="mainannounc">
        <div class="content">
            <div class="slidenpic">
                <img src="/images/pexels-daniel-kux-932320.jpg" alt="DropPicture">
            </div>
            <div class="slidenpic">
                <div class="slideshow-container">
                    <div class="mySlides fade" style="height:100%;text-align:center;">
                        <div class="centerslider">
                            <h2 style="margin:0;">Kāpēc izvēlēties automatizētu ūdens nolasīšanas sistēmu?</h2>
                            <button id="default_button">Vairāk</button>
                        </div>
                    </div>
                    <div class="mySlides fade" style="height:100%;text-align:center;">
                        <div class="centerslider">
                            <h2 style="margin:0;">Mūsdienīga tehnoloģija</h2>
                            <button id="default_button">Vairāk</button>
                        </div>
                    </div>
                    <div class="mySlides fade" style="height:100%;text-align:center;">
                        <div class="centerslider">
                            <h2 style="margin:0;">Tehniskas problēmas vai jautājumi?</h2>
                            <a href="/contacts" id="default_button">Sazinies ar mums</a>
                        </div>
                    </div>
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                    <div style="text-align:center; position:absolute; bottom:0; width: 100%;">
                        <span class="dot" onclick="currentSlide(1)"></span> 
                        <span class="dot" onclick="currentSlide(2)"></span> 
                        <span class="dot" onclick="currentSlide(3)"></span> 
                    </div>
                </div>
            </div>
        </div>
        <div class="announcements">
            @forelse ($announcements as $announcement)
            <div >
                @include ('announcements.card')
            </div>
            @empty
                <div>No projects yet.</div>
            @endforelse
        </div>
    </main>
</body>
</x-layout>