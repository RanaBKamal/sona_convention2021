@extends('layouts.master')

@section('page-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top:20px;">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">Submit your work</h3>
                    </div>
                    <div class="col-md-12">
                        <p style="text-align: justify-all;line-height: 1.2em;">
                            Abstracts from a wide range of architecture fields are encouraged for submission. The conference theme tracks are mentioned above and it is intended to bring diversity in content as well as context in the discussion. We are hopeful that the “response” of architecture practice is an impactful theme in addressing the global context of change. 
                        </p>
                    </div>
                </div>
            </div>
            <div class="jumbotron">
                <section class="section registration">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Individual Presentation</h4>
                                <p style="line-height: 1.2em;">
                                    Individual presentation includes scholar and professional research that has not been published elsewhere. Any individual can submit their abstract.
                                </p>
                                <ul style="list-style-type: none;">
                                    <li>i. Summary (1500-2000 Words) which may include well labelled data, graphs, pictures and other information. The summary must be written in the given format which must include but not limited to; Introduction, Methods, Analysis, Discussion and Conclusion (refer. <a target="_blank" class="themecolor" href="/assets/downloadables/toupload/summary_abstract_format.pdf">Abstract/Summary Format</a>) attached herewith.
                                    </li>
                                    <li>
                                        ii. Abstract of 100 words which is included in the summary format
                                    </li>
                                    <li>
                                        iii. Authors’ biography 200 words
                                    </li>
                                    <li>
                                        iv. Authors’ submission form (Refer. <a target="_blank" class="themecolor" href="/assets/downloadables/toupload/application_form_authors.pdf">Author Submission Form</a>)
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="/work_files" id="individual_presentation_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row" style="margin-top:20px;">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="themecolor">Summary/Abstract(.pdf,.docx, MAX:5mb)</label>
                                                <input type="file" class="form-control" @error('summary_abstract') is-invalid @enderror name="summary_abstract" required >
                                                @error('summary_abstract')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="themecolor">Author Information(.pdf,.docx, MAX:5mb)</label>
                                                <input type="file" class="form-control" @error('author_information') is-invalid @enderror name="author_information" required >
                                                @error('author_information  ')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="checkbox" name="agree" required>
                                                I agree the terms and condition of Society of Nepalese Architects(convention 2021).
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="hidden" name="presentation_type" required value="individual_presentation">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt20">
                                        <button  type="submit" class="btn btn-theme">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Your Previous submission</h5>
                                <table class="table table-responsive table-bordered">
                                    <thead>
                                        <th>S.N.</th>
                                        <th>Abstract/Summary</th>
                                        <th>Author Submission</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </thead>
                                    <tboy>
                                        @if($work_files->isNotEmpty())
                                            @php
                                                $count = 0;
                                            @endphp
                                            @foreach($work_files as $work_file)
                                                @if(strcmp($work_file->presentation_type, 'individual_presentation') == 0)
                                                    <tr>
                                                        <td>
                                                            {{$count+1}}
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" target="_blank" href="{{'/storage/'.$work_file->summary_abstract}}">View File</a>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" target="_blank" href="{{'/storage/'.$work_file->author_information}}">View File</a>
                                                        </td>
                                                        <td>
                                                            {{$work_file->created_at->format('Y-m-d')}}
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-danger" href="{{'/work_files/'.$work_file->id}}">Delete</a>
                                                        </td>
                                                        @php
                                                            ++$count;
                                                        @endphp
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>   
                    </div>
                </section>
            </div>
            <div class="jumbotron">
                <section class="section registration">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Poster Presentation</h4>
                                <p style="line-height: 1.2em;">
                                    The poster session will be held for an hour long during the conference, intending to have a group discussion and exchange session. 
                                </p>
                                <h5>Submission requirement: </h5>
                                <ul style="list-style-type: none;">
                                    <li>i. Abstract of 500 words (Refer <a target="_blank" class="themecolor" href="/assets/downloadables/toupload/poster_abstract_format.pdf">Poster Abstract Format</a>). 
                                    </li>
                                    <li>
                                        ii. Authors’ biography 200 words
                                    </li>
                                    <li>
                                        iii. Authors submission form (Refer <a target="_blank" class="themecolor" href="/assets/downloadables/toupload/application_form_authors.pdf">Author Submission Form</a>)
                                    </li>
                                    <li>
                                        iv. Poster: 841mm x 594mm pre-printed to be brought along with during the event. 
                                    </li>
                                    <li>
                                        v. The digital poster should be submitted no later than October 20,2021. 
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="/work_files" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row" style="margin-top:20px;">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="themecolor">Summary/Abstract(.pdf,.docx, MAX:5mb)</label>
                                                <input type="file" class="form-control" @error('summary_abstract') is-invalid @enderror name="summary_abstract" required>
                                                @error('summary_abstract')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="themecolor">Author Information(.pdf,.docx, MAX:5mb)</label>
                                                <input type="file" class="form-control" @error('author_information') is-invalid @enderror name="author_information" required >
                                                @error('author_information  ')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="checkbox" name="agree" required>
                                                I agree the terms and condition of Society of Nepalese Architects(convention 2021).
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="hidden" name="presentation_type" required value="poster_presentation">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt20">
                                        <button  type="submit" class="btn btn-theme">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Your Previous submission</h5>
                                <table class="table table-responsive table-bordered">
                                    <thead>
                                        <th>S.N.</th>
                                        <th>Abstract/Summary</th>
                                        <th>Author Submission</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </thead>
                                    <tboy>
                                        @if($work_files->isNotEmpty())
                                            @php
                                                $count = 0;
                                            @endphp
                                            @foreach($work_files as $work_file)
                                                @if(strcmp($work_file->presentation_type, 'poster_presentation') == 0)
                                                    <tr>
                                                        <td>
                                                            {{$count+1}}
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" target="_blank" href="{{'/storage/'.$work_file->summary_abstract}}">View File</a>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" target="_blank" href="{{'/storage/'.$work_file->author_information}}">View File</a>
                                                        </td>
                                                        <td>
                                                            {{$work_file->created_at->format('Y-m-d')}}
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-danger" href="{{'/work_files/'.$work_file->id}}">Delete</a>
                                                        </td>
                                                        @php
                                                            ++$count;
                                                        @endphp
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>   
                    </div>
                </section>
            </div>    
        </div>  
        <div class="col-md-4" style="margin-top:20px;">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">Pay your registration fee</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <label style="display:block;padding-top: 30px;">Pay with</label>
                                <img src="{{asset('/images/esewa_logo.png')}}" style="background:black;padding: 5px;border-radius: 4px; margin-bottom: 10px;">
                                <form action="#" method="POST">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <select onchange="typeSelected(event)" class="form-control">
                                                <option >Select Who you are?</option>
                                                <option value="1500">NGS members</option>
                                                <option value="500">Non-NGS participant</option>
                                                <option value="3000">Geotechnical Student</option>
                                            </select>
                                            <label>Total Fee : <b id="totalAmountShow"></b></label>  
                                        </div>
                                    </div>
                                    <hr>
                                    <input value="0" name="tAmt" type="hidden" id="totalAmount">
                                    <input value="0" name="amt" type="hidden" id="amount">
                                    <input value="0" name="txAmt" type="hidden">
                                    <input value="0" name="psc" type="hidden">
                                    <input value="0" name="pdc" type="hidden">
                                    <input value="{{config('payment.esewa.scd')}}" name="scd" type="hidden">
                                    <input value="{{Str::uuid()}}" name="pid" type="hidden">
                                    <input value="{{config('payment.esewa.su')}}" type="hidden" name="su">
                                    <input value="{{config('payment.esewa.fu')}}" type="hidden" name="fu">
                                    <input value="Submit" type="submit" class="btn btn-success" id="submitButton">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>          
    </div>
</div>
@endsection
@section('js')
    <script>
        var submitButton = document.getElementById("submitButton");
        submitButton.classList.add("disabled");
        function typeSelected(event){
            document.getElementById("totalAmount").value = event.target.value;
            document.getElementById("totalAmountShow").innerHTML = event.target.value;
            document.getElementById("amount").value = event.target.value;
            submitButton.classList.remove("disabled");
        }
    </script>
@stop