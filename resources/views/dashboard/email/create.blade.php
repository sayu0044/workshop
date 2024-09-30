@extends('dashboard.layout.main')

@section('container')
<div class="col-lg-9 animated fadeInRight">
    <div class="mail-box-header">
        <br>
        <div class="float-right tooltip-demo">
            <a href="{{ route('email.index') }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
        </div>
        <h2>
            Compose mail
        </h2>
    </div>
    <div class="mail-box">
        <div class="mail-body">
            <form action="{{ isset($emails) ? route('email.update', $emails->id) : route('email.store') }}" method="POST">
                @csrf
                @if(isset($emails))
                    @method('PUT')
                @endif

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">To:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="to" value="{{ isset($emails) ? $emails->to : 'alex.smith@corporat.com' }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Subject:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="subject" placeholder="Enter subject" value="{{ isset($emails) ? $emails->subject : '' }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Message:</label>
                    <textarea class="form-control" name="message_text" rows="8" required>{{ isset($emails) ? $emails->message_text : '<h3>Hello Jonathan!</h3> Dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry\'s</strong> standard dummy text ever since the 1500s...' }}</textarea>
                </div>

                <div class="mail-body text-right tooltip-demo">
                    <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Send">
                        <i class="fa fa-reply"></i> Send
                    </button>
                    <a href="{{ route('email.index') }}" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email">
                        <i class="fa fa-times"></i> Discard
                    </a>
                    <button type="submit" name="is_draft" value="1" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Save as Draft">
                        <i class="fa fa-pencil"></i> Draft
                    </button>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection