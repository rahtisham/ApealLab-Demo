<x-app-layout>
    <style>
        .pakageFontWeight
        {
            font-weight: 700;
        }
        .pakagePrice
        {
            font-family: 'Poppins';
            font-size: 70px;
            font-weight: 800;
            margin-left: 25px;
        }
        .pakageDesk
        {
            margin-top: 13px;
            display: flex;
            align-items: baseline;
        }
        .pakageDescription
        {
            padding-right: 20px;
        }
        .paragraphSpacing
        {
            margin-left: 30px;
        }
        .Pakages
        {
            margin-top: 15px;
        }
        i
        {
            color: #03c6ad;
        }
        .bgColorButton
        {
            background: #03c6ad;
        }
        .HoverCard:Hover
        {
            border: 2px solid #1E2338;
            border-radius: 16px 16px 0px 0px;
            /* color: white; */
        }

    </style>
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Plan</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Pakages</a></li>
            </ol>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4">
                <a href="#">
                    <div class="card HoverCard">
                        <div class="card-header">
                            <h4 class="card-title pakageFontWeight">AMAZONE</h4>
                            <button type="button" class="btn btn-primary btn-xxs">Papular</button>
                        </div>
                       <img src="{{ asset('AppealLab/images/amazon-logo.png') }}">
                    </div>
                </a>
            </div>
            <div class="col-xl-4">
                <a href="#">
                    <div class="card HoverCard">
                        <div class="card-header">
                            <h4 class="card-title pakageFontWeight">AMAZONE</h4>
                            <button type="button" class="btn btn-primary btn-xxs">Papular</button>
                        </div>
                    <img src="{{ asset('AppealLab/images/walmart-logo1.jpg') }}">
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>