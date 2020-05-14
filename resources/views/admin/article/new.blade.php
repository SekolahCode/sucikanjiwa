@include('admin.layouts.header')
<body class="sidebar-noneoverflow" data-spy="scroll" data-target="#navSection" data-offset="100">
     <!-- BEGIN LOADER -->
     <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->
    @include('admin.layouts.navbar')
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        @include('admin.layouts.topbar') 
         <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
        <div class="ml-5 mr-5">
            <div id="basic" class="row layout-spacing layout-top-spacing">
                <form class="form-vertical" action="{{ route('post.article') }}" name="save-form">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-sm-12" style="width: 80vw;">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12 ">
                                        <h4> Editor Article </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area article-div">
                                <input type="hidden" name="content">
                                <div id="scrolling-container" style=" height: 100%;min-height: 100%;overflow-y: auto;">
                                    <div id="editor-container" class="article-content" style="overflow-y: visible;height:68vh"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12" style="width: 80vw;!important">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Editor Author's </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Image <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="image">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="control-label">Title:</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="control-label">Author:</label>
                                    <input type="text" name="author" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="control-label">Post:</label>
                                    </br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline1">Publish</label>
                                        </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline2">Save as Draft</label>
                                    </div>
                                </div>
                                <input class="btn btn-primary mt-3 btn-block" id="btnSubmit" value="Save" type="submit">
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>
        <!--  END CONTENT AREA  -->
        @include('admin.layouts.footer')
        <!--  END CONTENT AREA  -->    
    </div>
    <!-- END MAIN CONTAINER -->
    @include('admin.layouts.script')
</body>
</html>