@extends('layouts.index')

@push('css')

<!-- Favicons -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

<!-- Bootstrap Tag CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}">

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

<!-- Fancybox CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css') }}">

<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">

<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

<!-- Datatables CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">

<!-- Summernote CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/dist/summernote-bs4.css') }}">

<!-- Main CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

@stack('dash-css')

<style>
    .footer {
        display: none;
    }

</style>



@endpush

@section('app-content')

@include('livewire.frontend.layouts.partials.header')

<div class="content" style="min-height: 47px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 back-text">
                <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-primary back-btn"><i class="fa fa-chevron-left"></i> Back </a>
            </div>
            <div class="col-md-12">

                <div class="chat-window">

                    <!-- Chat Left -->
                    <div class="chat-cont-left">
                        <div class="chat-header">
                            <form class="chat-search">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <i class="fas fa-search icon-circle"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                            </form>
                        </div>
                        <div class="chat-users-list">

                            <div class="chat-scroll">

                                @foreach($conversations as $key => $conversation)

                                    @php
                                    if($conversation->type == 'group'){
                                    $src = optional(optional($conversation)->illustration)->url ?? 'assets/img/img-02.jpg';
                                    }else {
                                    $src = optional(optional(optional(optional($conversation)->interlocuteur)->first())->profile)->url ?? 'assets/img/img-02.jpg';
                                    }
                                    //$src ='assets/media/avatars/avatar10.jpg';
                                    $nbreUnread = optional(optional(optional($conversation)->groupe_users)->first())->messages_count ?? 0;
                                    @endphp

                                    <a href="{{ route('backend.conversations.show', $conversation->id) }}" class="media" onclick="markHasRead({{ $conversation->id }});">
                                        <div class="media-img-wrap">
                                            <div class="avatar avatar-away">
                                                <img src="{{ asset($src) }}" alt="" alt="User Image" class="avatar-img rounded-circle">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div>

                                                <div class="user-name">
                                                    @if($conversation->type=="group")
                                                    {{ str_replace('\\', '', $conversation->name) }}
                                                    @else
                                                    {{ str_replace('\\', '', optional(optional($conversation->interlocuteur)->first())->nom) }}
                                                    {{ str_replace('\\', '', optional(optional($conversation->interlocuteur)->first())->prenom) }}
                                                    @endif

                                                </div>
                                                <div class="user-last-chat">{{ $conversation->last_message->first() != null ? \Str::ucfirst(str_replace('\\', '', \Str::limit($conversation->last_message->first()->content,24,'...'))) : '' }}
                                                </div>

                                            </div>
                                            <div>
                                                <div class="last-chat-time block">

                                                    @if($conversation->last_message->first() != null)

                                                    @if(\Carbon\Carbon::now()->format('Y-m-d') == \Carbon\Carbon::parse($conversation->last_message->first()->created_at)->format('Y-m-d'))

                                                    {{ \Carbon\Carbon::parse($conversation->last_message->first()->created_at)->format('h:m') }}

                                                    @else

                                                    @php
                                                    $date = \Carbon\Carbon::parse($conversation->last_message->first()->created_at)->format("Y-m-d H:i");
                                                    @endphp

                                                    @if (\Carbon\Carbon::now()->startOfWeek()->format("Y-m-d H:i") <= $date && \Carbon\Carbon::now()->endOfWeek()->format("Y-m-d H:i") >= $date)
                                                        {{ \Carbon\Carbon::parse($conversation->last_message->first()->created_at)->format('l') }}
                                                        @else
                                                        {{ \Carbon\Carbon::parse($conversation->last_message->first()->created_at)->format('d/m/Y') }}
                                                        @endif

                                                        @endif

                                                        @endif
                                                </div>
                                                @if($nbreUnread>0)
                                                <div class="badge bgg-yellow badge-pill">{{ $nbreUnread }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>

                                @endforeach

                            </div>

                        </div>

                    </div>
                    <!-- /Chat Left -->

                    <!-- Chat Right -->
                    <div class="chat-cont-right">
                        @if(isset($conversation))

                            @php
                                if(isset($conversation)){

                                    if($conversation->type == 'group'){

                                        $src =  optional(optional($conversation)->illustration)->url ?? 'assets/img/img-05.jpg';
                                    }else {
                                        $src = optional(optional(optional($conversation->interlocuteur)->first())->profile)->url ?? 'assets/img/img-05.jpg';
                                    }
                                }
                                else {
                                    $conversation = null;
                                    $src=null;
                                }

                            @endphp
                        @else
                            @php
                                $conversation = null;
                                $src=null;
                            @endphp

                        @endif
                        <div class="chat-header">

                            <a id="back_user_list" href="javascript:void(0)" onclick="window.history.back();" class="back-user-list">
                                <i class="material-icons">chevron_left</i>
                            </a>
                            <div class="media">
                                <div class="media-img-wrap">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset($src ?? 'assets/img/img-05.jpg') }}" alt="User Image" class="avatar-img rounded-circle">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="user-name">
                                        @if(optional($conversation)->type=="group")
                                        {{ str_replace('\\', '', $conversation->name) }}
                                        @else
                                        {{ str_replace('\\', '', optional(optional(optional($conversation)->interlocuteur)->first())->nom) }}
                                        {{ str_replace('\\', '', optional(optional(optional($conversation)->interlocuteur)->first())->prenom) }}
                                        @endif
                                    </div>
                                    <div class="user-status">online</div>
                                </div>
                            </div>
                            <div class="chat-options">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#voice_call">
                                    <i class="material-icons icon-grey">local_phone</i>
                                </a>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#video_call">
                                    <i class="material-icons icon-grey">videocam</i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </div>
                        </div>
                        <div class="chat-body">
                            <div class="chat-scroll">
                                <ul class="list-unstyled">
                                    @foreach (optional($messages)->sortBy('created_at') as $message )

                                        @if($message->author->id != auth()->id())
                                            <li class="media received">
                                                <div class="avatar">
                                                    <img src="{{ asset(optional(optional(optional($message)->author)->profile)->url ??'assets/img/img-02.jpg')}}" alt="User Image" class="avatar-img rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <div class="msg-box">
                                                        <div>

                                                            @if(count($message->attached_files) >0 )
                                                                @foreach ($message->attached_files as $file)
                                                                    <a href="javascript:void(0)" class="mr-2">
                                                                        @if (strpos($file->url, '.png') || strpos($file->url, '.jpeg') || strpos($file->url, '.jpg'))
                                                                            <img class="avatar-img" style=" width: 172px;height: 194px; border: 4px solid #d9e2e6; border-radius: .4rem;" src="{{ asset($file->url ?? 'assets/img/img-02.jpg') }}" alt="User Image">
                                                                        @else
                                                                            <embed src="{{ asset($file->url ?? 'assets/img/img-02.jpg') }}">
                                                                        @endif
                                                                    </a>
                                                                @endforeach
                                                            @endif
                                                            <p>{!! nl2br(e(str_replace('\\', '', $message->content))) !!}</p>
                                                            <ul class="chat-msg-info">
                                                                <li>
                                                                    <div class="chat-time">
                                                                        <span>{{ \Carbon\Carbon::parse($message->created_at)->format('g:i A') }}</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @else
                                            <li class="media sent">
                                                <div class="avatar">
                                                    <img src="{{ asset(optional(auth()->user()->profile)->url ?? 'assets/img/img-05.jpg') }}" alt="User Image" class="avatar-img rounded-circle">
                                                </div>
                                                <div class="media-body">
                                                    <div class="msg-box">
                                                        <div>

                                                            @if(count($message->attached_files) >0 )
                                                                @foreach ($message->attached_files as $file)
                                                                    <a href="javascript:void(0)" class="mr-2">
                                                                        @if (strpos($file->url, '.png') || strpos($file->url, '.jpeg') || strpos($file->url, '.jpg'))

                                                                            <img class="avatar-img" style=" width: 172px;height: 194px; border: 4px solid #d9e2e6; border-radius: .4rem;" src="{{ asset($file->url ?? 'assets/img/img-02.jpg') }}" alt="User Image">

                                                                        @else
                                                                            <embed src="{{ asset($file->url ?? 'assets/img/img-02.jpg') }}">
                                                                        @endif
                                                                    </a>
                                                                @endforeach
                                                            @endif

                                                            <p>{!! nl2br(e(str_replace('\\', '', $message->content))) !!}</p>
                                                            <ul class="chat-msg-info">
                                                                <li>
                                                                    <div class="chat-time">
                                                                        <span>{{ \Carbon\Carbon::parse($message->created_at)->format('g:i A') }}</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif

                                    @endforeach

                                </ul>

                                <div class="text-center pt-2 pb-2 fs-sm fw-semibold bg-body-light" id="attached-files-preview" style="display: none;margin-left: -32px;margin-right: -32px;margin-bottom: -1px;background-color: #f6f7f9;">

                                </div>
                            </div>
                        </div>
                        <div class="chat-footer">

                            <form action="{{ route('backend.conversations.send_message') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <div class="avatar">
                                            <img src="{{ asset(optional(auth()->user()->profile)->url ?? 'assets/img/img-05.jpg') }}" alt="User Image" class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <input type="text" class="input-msg-send form-control" placeholder="Reply..." name="content">
                                    <div class="input-group-append">
                                        <div class="btn-file btn">
                                            <i class="far fa-grin fa-1x"></i>
                                        </div>
                                        <div class="btn-file btn">
                                            <i class="fa fa-paperclip"></i>
                                            <input type="file" onchange="showPreviewAttachedFiles(event);" id="attached-files" multiple name="attached_files[]">
                                        </div>
                                        <button type="submit" class="btn btn-primary msg-send-btn"><i class="fab fa-telegram-plane"></i></button>
                                    </div>

                                    <input type="hidden" value="{{ $conversation->id }}" name="group_id" id="group_id">
                                    <input type="hidden" name="parent_message_id" id="message_id">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /Chat Right -->

                </div>
            </div>
        </div>
    </div>
</div>

@include('livewire.frontend.layouts.partials.footer')
@endsection

@push('js')


<!-- jQuery -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

<!-- Bootstrap Bundle JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Select2 JS -->
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<!-- Datatables JS -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>

<!-- Chart JS -->
@if(Route::is(['dashboard','freelancer-dashboard']))
<script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
@endif

<!-- Sticky Sidebar JS -->
<script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
<script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

<!-- Fancybox JS -->
<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>

<!-- Datetimepicker JS -->
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Owl Carousel -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

<!-- Select2 JS -->
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<!-- Range JS -->
@if(Route::is(['developer','project']))
<script src="{{ asset('assets/js/range.js') }}"></script>
@endif

<!-- Slick JS -->
<script src="{{ asset('assets/js/slick.js') }}"></script>

<!-- Bootstrap Tagsinput JS -->
<script src="{{ asset('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>

<!-- Summernote JS -->
<script src="{{ asset('assets/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/profile-settings.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        document.getElementsByTagName('body')[0].removeAttribute("class");
        document.getElementsByTagName('body')[0].setAttribute("class", 'chat-page');
    });

    function markHasRead(id) {

        $.ajax({
                url: "{{ route('backend.conversations.markHasRead')}}"
                , type: "POST"
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , data: {
                    id: id
                , }
                , dataType: 'json',

            }).done(function(data) {
                $('.chat-users-list').load(location.href + ' .chat-users-list>*', '');
            })
            .fail(function(data) {
                console.log(data.responseJSON);
                $.each(data.responseJSON.errors, function(key, value) {
                    var input = '#modal-block-normal input[name=' + key + ']';
                    $(input + '+small').text(value);
                    $(input).parent().addClass('has-error');
                });
            });

    }

    function showPreviewAttachedFiles(event) {

        if (event.target.files.length > 0) {
            var preview = document.getElementById('attached-files-preview');
            console.log(preview);
            var content = '';
            for (let index = 0; index < event.target.files.length; index++) {
                var src = URL.createObjectURL(event.target.files[index]);

                console.log(src);

                var div1 = document.createElement('div');

                div1.setAttribute('class', 'col-md-2 mr-2');
                div1.setAttribute('id', index + '' + src);
                div1.setAttribute('style', 'margin-bottom:16px; margin-right:8px; display:inline-block; text-align:center;');
                var a1 = document.createElement('a');
                a1.setAttribute('type', 'button');

                var img = document.createElement('img');

                img.setAttribute('src', src);
                img.setAttribute('class', 'img-thumbnail');
                img.setAttribute('width', '150');
                img.setAttribute('height', '200');
                img.setAttribute('style', 'margin-bottom:12px;');

                a1.appendChild(img);

                div1.appendChild(a1);

                var btn = document.createElement('button');

                btn.setAttribute('type', 'button');
                btn.setAttribute('class', 'btn btn-link remove_image text-danger');

                btn.onclick = function() {
                    deleteFiles(index + '' + src);
                }

                var i1 = document.createElement('i');

                i1.setAttribute('class', 'fa fa-fw fa-times text-danger');

                btn.appendChild(i1);

                btn.append("   Supprimer");

                div1.appendChild(btn);

                preview.appendChild(div1);

            }
            preview.style.display = "block";
        }
    }

    function deleteFiles(id) {
        document.getElementById(id).style.display = "none";
    }

</script>

@stack('dash-js')

@endpush
