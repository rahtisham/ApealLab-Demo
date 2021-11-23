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
            /* color: white; */
        }

    </style>
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Components</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">UI Slider</a></li>
            </ol>
        </div>
        <div class="row">
            @foreach($plans as $CreatedPlans)
            <div class="col-xl-4">
                <div class="card HoverCard">
                    <div class="card-header">
                        <h4 class="card-title pakageFontWeight">{{ $CreatedPlans->name }}</h4>
                        <button type="button" class="btn btn-primary btn-xxs">Papular</button>
                    </div>
                    <div class="pakageDesk">
                        <h1 class="pakagePrice">${{ $CreatedPlans->cost }}</h1>
                        <span>/ month</span>
                    </div>
                    <div class="pakageDescription">
                        <p class="paragraphSpacing">{{ $CreatedPlans->description }}</p>
                    </div>
                    <hr>
                    <div class="Pakages">
                        <h5 class="paragraphSpacing"><i class="fa fa-check" aria-hidden="true"></i> All Features is standard</h5>
                    </div>
                    <div class="Pakages">
                        <h5 class="paragraphSpacing"><i class="fa fa-check" aria-hidden="true"></i> Over 600 Componenets</h5>
                    </div>
                    <div class="Pakages">
                        <h5 class="paragraphSpacing"><i class="fa fa-check" aria-hidden="true"></i> Build tools and examples</h5>
                    </div>
                    <div class="Pakages">
                        <h5 class="paragraphSpacing"><i class="fa fa-check" aria-hidden="true"></i> Stepping And Snapping</h5>
                    </div>
                    <div class="card-body">
                        <div id="basic-slider">
                        <a href="{{ url('user/subscription/plan/show', $CreatedPlans->slug) }}" class="btn btn-primary btn-lg btn-block bgColorButton">GET STARTED</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>