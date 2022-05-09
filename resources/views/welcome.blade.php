<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Insly Q&B</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}" />

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
  
    <div class="container">
     
       
        <div class="row mt-3 mb-3 pt-2 px-2 border">
            <div class="col header">
                <div class="text-left" style="width: 400px;">
                <h1>Key Features</h1>
                <h2><B>Quote & Bind</B></h2>
            </div>
            </div>
           
            <div class="col  uil-insly justify-content-end d-flex" style="height:80px">
             <img src="/images/insly_logo.png" width=""  />
            </div>
        </div>


        <div class="row mt-4">
            <div class="col">
                <h3> <i class="uil uil-web-grid" ></i> Schemas (Products) </h3>
                <ul class="list insly">
                    <li class="list-item">Definition of any insurance product</li>
                    <li class="list-item">Visual design of quote submission forms</li>
                    <li class="list-item">External connections to 3rd party data sets</li>
                    <li class="list-item">Submission form versions management</li>
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-file-alt" ></i> Quotes </h3>
                <ul class="list insly">
                    <li class="list-item">Registration and updates of submissions</li>
                    <li class="list-item">Any types: new, adjustment, termination</li>
                    <li class="list-item">Generation any document in the process</li>
                    <li class="list-item">Transition to custom defined stage/status</li>
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-umbrella" ></i> Policies </h3>
                <ul class="list insly">
                    <li class="list-item">Full scale issued policies admin</li>
                    <li class="list-item">Mid term policies adjustments </li>
                    <li class="list-item">Tracking and controll of renewals</li>
                    <li class="list-item">Automatic renewal policies generation</li>
                </ul>
            </div>
            <div class="col">
                <h3> <i class="uil uil-bag" ></i> Clients </h3>
                <ul class="list insly">
                    <li class="list-item">Managing corporate and private clients</li>
                    <li class="list-item">Direct client linking with policy, invoice</li>
                    <li class="list-item">Multiple contacts and addresses</li>
                    <li class="list-item">Clients inter relations managing</li>
                </ul>
            </div>
        </div>

  

        <div class="row mt-4">
            <div class="col">
                <h3> <i class="uil uil-book-open" ></i> Binders </h3>
                <ul class="list insly">
                    <li class="list-item">Master and annual (limited) binders concept</li>
                    <li class="list-item">Binder related documents upload</li>
                    <li class="list-item">Annual binders controll & renewals</li>
                    <li class="list-item">Risks, insurers, proportions admin in binder</li>
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-archive" ></i> Endorsements </h3>
                <ul class="list insly">
                    <li class="list-item">Specific conditions/endoresements libraries</li> 
                    <li class="list-item">Predefined conditions/subjectivities</li> 
                    <li class="list-item">Custom endorsements linking to quote</li> 
                    <li class="list-item">Endorsement parameters: product, limit, GWP </li> 
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-code-branch" ></i> Workflows </h3>
                <ul class="list insly">
                    <li class="list-item">Custom designed workflow stages</li>
                    <li class="list-item">Separate flows for renewal or MTA</li>
                    <li class="list-item">Visual representation of workflow</li>
                    <li class="list-item">Workflow versions management</li>
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-bell" ></i> Notifications </h3>
                <ul class="list insly">
                    <li class="list-item">Notifications inside the application</li>
                    <li class="list-item">Notifications send as email messages</li>
                    <li class="list-item">Referals or acceptance as notification</li>
                    <li class="list-item">Possibility to mark as processed</li>
                </ul>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <h3> <i class="uil uil-invoice" ></i> Invoices </h3>
                <ul class="list insly">
                    <li class="list-item">Financial invoices management</li>
                    <li class="list-item">Issuing for agents or direct client</li>
                    <li class="list-item">Mark invoice as paid, track outdated</li>
                    <li class="list-item">Printouts as credit/debit notes</li>
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-transaction" ></i> Payments </h3>
                <ul class="list insly">
                    <li class="list-item">Creating payment and relating to account</li> 
                    <li class="list-item">Fully or party mapping with invoices</li> 
                    <li class="list-item">Multicurrency payments and settlements</li> 
                    <li class="list-item">Specific payment terms by brokers</li> 
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-newspaper" ></i> Agent Statements </h3>
                <ul class="list insly">
                    <li class="list-item">Managing ad-hoc agent statements </li>
                    <li class="list-item">Including agent recievables in statement</li>
                    <li class="list-item">Calculating period agent recievables</li>
                    <li class="list-item">Automatic agent statements generation</li>
                </ul>
            </div>
            
            <div class="col uil-insly">
                <h3> <i class="uil uil-schedule" ></i> Tasks & Diary </h3>
                <ul class="list insly">
                    <li class="list-item">Custom tasks/activities creation</li> 
                    <li class="list-item">Linking task to client, policy, invoice</li> 
                    <li class="list-item">Open tasks diary with filters</li> 
                    <li class="list-item">Notifications on overdue tasks</li> 
                </ul>
            </div>
        </div>
        {{-- 
        <div class="row mt-4">
            <div class="col">
                <h3> <i class="uil uil-university" ></i> Payment Accounts </h3>
                <ul class="list insly">
                    <li class="list-item">-</li>
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-credit-card" ></i> Payment Plans </h3>
                <ul class="list insly">
                    <li class="list-item"-</li> 
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-wallet" ></i> Payment Terms </h3>
                <ul class="list insly">
                    <li class="list-item">-</li>
                </ul>
            </div>
        </div> --}}

       


        <div class="row mt-4">
            <div class="col">
                <h3> <i class="uil uil-briefcase" ></i> Agents & Brokers </h3>
                <ul class="list insly">
                    <li class="list-item">All details about retail network</li>
                    <li class="list-item">Managing headquarters and subsidiaries</li>
                    <li class="list-item">TOBA dates and control</li>
                    <li class="list-item">Product specific commissions</li>
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-user" ></i> Users </h3>
                <ul class="list insly">
                    <li class="list-item">List & manage system users</li> 
                    <li class="list-item">Brokers self registration</li> 
                    <li class="list-item">Two Factor Authentification (TFA)</li> 
                    <li class="list-item">Remind password functionality</li> 
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-shield" ></i> Roles & Permissions </h3>
                <ul class="list insly">
                    <li class="list-item">Over 300 permissions to control any angle</li>
                    <li class="list-item">Grouping permissions to the roles</li>
                    <li class="list-item">Multiple roles linking to user</li>
                    <li class="list-item">Custom permissions, handling in quote</li>
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-setting" ></i> General Settings </h3>
                <ul class="list insly">
                    <li class="list-item">General: currencies, countries, counties, etc.</li>
                    <li class="list-item">Regional, formating settings per instance</li> 
                    <li class="list-item">Recievable transactions configuration</li> 
                    <li class="list-item">Payment accounts and plans configuration</li> 
                </ul>
            </div>
           
        </div>

        <div class="row mt-4">
            <div class="col">
                <h3> <i class="uil uil-file-plus-alt" ></i> Documents </h3>
                <ul class="list insly">
                    <li class="list-item">Document templates direct uploading</li>
                    <li class="list-item">Document templates multilanguage</li>
                    <li class="list-item">Generated document by templates</li>
                    <li class="list-item">Full document templates versions control</li>
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-envelope" ></i> Emails </h3>
                <ul class="list insly">
                    <li class="list-item">Email sending from system</li> 
                    <li class="list-item">Email templates management</li> 
                    <li class="list-item">All sent emails history log</li> 
                    <li class="list-item">Automatic email sending from quote</li> 
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-traffic-light" ></i> Scheduled Jobs </h3>
                <ul class="list insly">
                    <li class="list-item">Jobs to process reports or renewals</li>
                    <li class="list-item">Setting up job run schedule</li>
                    <li class="list-item">Jobs execution history log</li>
                    <li class="list-item">Manual job execution</li>
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-database-alt" ></i> Export & Import </h3>
                <ul class="list insly">
                    <li class="list-item">Export possibility of entered data</li> 
                    <li class="list-item">Export only structure templates</li> 
                    <li class="list-item">Import data using Excel template</li>
                    <li class="list-item">Full import data preview & validation</li> 
                </ul>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col">
                <h3> <i class="uil uil-clouds" ></i> OneDrive Integration </h3>
                <ul class="list insly">
                    <li class="list-item">Live connection to the company OneDrive</li> 
                    <li class="list-item">Files upload to OneDrive via platform</li> 
                    <li class="list-item">Client folders linking with OneDrive</li> 
                    <li class="list-item">Quotes/policies documents upload to OneDrive</li> 
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-database" ></i> Data Models </h3>
                <ul class="list insly">
                    <li class="list-item">Custom data models from raw DB structure</li> 
                    <li class="list-item">Data model setup based on SQL queries</li> 
                    <li class="list-item">Support OData standard for live data export</li> 
                    <li class="list-item">Link with BI tools: Power BI, Tableau</li> 
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-chart-bar" ></i> Reports </h3>
                <ul class="list insly">
                   <li class="list-item">Standard admin and financial reports</li>  
                   <li class="list-item">Customer and bespoke reports</li>  
                   <li class="list-item">Permissions based reports access</li> 
                   <li class="list-item">Reports in decent formats: XLS, CSV, Json</li> 
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-brackets-curly" ></i> API Access </h3>
                <ul class="list insly">
                    <li class="list-item">Over 600 API enpoints for remote access</li>
                    <li class="list-item">Token based authentification</li>
                    <li class="list-item">Permissions based API endpoints access</li>
                    <li class="list-item">Possibility to access from 3rd parties system</li> 
                </ul>
            </div>
        </div>


        <div class="row mt-4">
        <div class="col">
                <h3> <i class="uil uil-language" ></i> Multilanguage </h3>
                <ul class="list insly">
                    <li class="list-item">Out of the box multilanguages</li>
                    <li class="list-item">UI in 15 most common languages</li>
                    <li class="list-item">Each user can use specific language</li>
                    <li class="list-item">Custom quote form UI translation</li>
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-globe" ></i> Broker Portal </h3>
                <ul class="list insly">
                    <li class="list-item">Separate UI for brokers/producers</li> 
                    <li class="list-item">Simplified(limited) quote submission forms</li> 
                    <li class="list-item">Broker based data (quotes/clients) access</li> 
                   
                </ul>
            </div>
            <div class="col">
                <h3> <i class="uil uil-css3-simple" ></i> Custom Design </h3>
                <ul class="list insly">
                    <li class="list-item">Change UI to match your brand</li>
                    <li class="list-item">Custom logo upload</li>
                    <li class="list-item">Custom CSS styles management</li>
                    <li class="list-item">Custom image for login screen</li>
                </ul>
            </div>
            <div class="col uil-insly">
                <h3> <i class="uil uil-question-circle" ></i> Contextual Help </h3>
                <ul class="list insly">
                    <li class="list-item">Separate help sidebar inside of platform</li>  
                    <li class="list-item">Static help matching system page</li>
                    <li class="list-item">Related help articles</li>  
                </ul>
            </div>
          
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>