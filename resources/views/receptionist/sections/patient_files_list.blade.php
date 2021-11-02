<!-- Full-width images with number and caption text -->
@if(count($patient->files) > 0)
    <div class="slideshow-container">
            @foreach($patient->files as $file)
                <div class="mySlides align-items-center"> <!-- class=""mySlides fade" -->
                    <div class="card files " style="width: 18rem; height:30rem">
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid" src="{{url($file->path)}}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ str_replace(['.jpg', '.png'],'', $file->name ) }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        <div id="image-viewer">
            <span class="close">&times;</span>
            <img class="modal-content" id="full-image">
        </div>	
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        
    </div>

    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
        @foreach($patient->files as $file)
            <span class="dot" onclick="currentSlide(2)"></span>
        @endforeach
    </div>
@endif