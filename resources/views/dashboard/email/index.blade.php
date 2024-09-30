@extends('dashboard.layout.main')

@section('container')

    <div class="wrapper wrapper-content">
        <div class="row">
            <br>
            <div class="col-lg-3">
                <div class="ibox ">
                    <div class="ibox-content mailbox-content">
                        <div class="file-manager">
                            <br>
                            <a class="btn btn-block btn-primary compose-mail" href="{{ route('email.create') }}">Compose Email</a>
                            <div class="space-25"></div>
                            <br>
                                <ul class="folder-list m-b-md" style="padding: 0">
                                    <li><a href="mailbox.html"> <i class="fa fa-inbox "></i> Inbox <span class="label label-warning float-right">16</span> </a></li>
                                    <br>
                                    <li><a href="{{ route('email.sent') }}"> <i class="fa fa-envelope-o"></i> Send Mail</a></li>
                                    <br>
                                    <li><a href="mailbox.html"> <i class="fa fa-certificate"></i> Important</a></li>
                                    <br>
                                    <li><a href="mailbox.html"> <i class="fa fa-file-text-o"></i> Drafts <span class="label label-danger float-right">2</span></a></li>
                                    <br>
                                    <li><a href="mailbox.html"> <i class="fa fa-trash-o"></i> Trash</a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 animated fadeInRight">
                <div class="mail-box-header">
                    <br>
                    <div class="mail-tools tooltip-demo m-t-md">
                        <div class="btn-group float-right">
                            <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                            <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>

                        </div>
                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh inbox"><i class="fa fa-refresh"></i> Refresh</button>
                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>

                    </div>
                </div>
                    <div class="mail-box">

                    <table class="table table-hover table-mail">
                    <tbody>
                    <tr class="unread">
                        <td class="check-mail">
                            <input type="checkbox" class="i-checks">
                        </td>
                        <td class="mail-ontact"><a href="mail_detail.html">Anna Smith</a></td>
                        <td class="mail-subject"><a href="mail_detail.html">Lorem ipsum dolor noretek imit set.</a></td>
                        <td class=""><i class="fa fa-paperclip"></i></td>
                        <td class="text-right mail-date">6.10 AM</td>
                    </tr>
                    <tr class="unread">
                        <td class="check-mail">
                            <input type="checkbox" class="i-checks" checked>
                        </td>
                        <td class="mail-ontact"><a href="mail_detail.html">Jack Nowak</a></td>
                        <td class="mail-subject"><a href="mail_detail.html">Aldus PageMaker including versions of Lorem Ipsum.</a></td>
                        <td class=""></td>
                        <td class="text-right mail-date">8.22 PM</td>
                    </tr>
                    </tbody>
                    </table>


                    </div>
                </div>
            </div>
    </div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    console.log('Document ready');

    loadEmails();

    $('#newEmailBtn').click(function() {
        console.log('New Email button clicked');
        $('#newEmailModal').modal('show');
    });

    $('#sendEmailBtn').click(function() {
        console.log('Send Email button clicked');
        sendEmail();
    });

    function loadEmails() {
        console.log('Loading emails');
        $.ajax({
            url: '{{ route("email.index") }}',
            method: 'GET',
            success: function(response) {
                console.log('Emails loaded successfully');
                $('#emailList').html(response);
            },
            error: function(xhr) {
                console.error('Error loading emails:', xhr.responseText);
            }
        });
    }

    function sendEmail() {
        console.log('Sending email');
        var formData = $('#newEmailForm').serialize();
        $.ajax({
            url: '{{ route("email.store") }}',
            method: 'POST',
            data: formData,
            success: function(response) {
                console.log('Email sent successfully');
                $('#newEmailModal').modal('hide');
                $('#newEmailForm')[0].reset();
                loadEmails();
                alert('Email sent successfully!');
            },
            error: function(xhr) {
                console.error('Error sending email:', xhr.responseText);
                alert('Error sending email. Please try again.');
            }
        });
    }
});
</script>
@endsection