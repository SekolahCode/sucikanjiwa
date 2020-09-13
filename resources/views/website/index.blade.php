@include('website.layouts.header')

<body class="sidebar-noneoverflow">

    <div class="fq-header-wrapper">
        @include('website.layouts.navbar')

        @include('website.section.banner')
    </div>
        @include('website.section.event')
        
        @include('website.section.article')

        @include('website.section.quotes')

        @include('website.section.questions')
        
    @include('website.layouts.footer')

    @include('website.layouts.script')
</body>
</html>