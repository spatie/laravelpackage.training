<header class="mb-12 md:text-center">
    <h2 class="markup-h1">Dead simple setup</h2>
    <p class="markup-baseline">Start sending out newsletters in no time</p>
</header>

<div class="grid gap-12 md:cols-2 items-center dense">
    <div class="">
        <ol class="grid gap-4 markup-ol text-xl">
            <li>
                Grab your license
            </li>
            <li>
                <div>
                Setup Laravel hosting<br/>
                or use in an existing project
                </div>
            </li>
            <li>
                Install the package
            </li>
            <li>
                <div class="flex-1">Configure an email&nbsp;service</div>
            </li>
        </ol>
        <p class="mt-6 text-lg">
            <a href="{{ route('docs') }}" class="markup-link">Read the installation docs</a>
        </p>
    </div>

    <div class="md:start-1">
        {{--<p class="mb-3 uppercase font-medium text-xs text-dark-500">
            <span class="uppercase tracking-widest">Until March 20<sup>th</sup> — Instead of</span>
            <span class="currency">$</span><span class="font-bold tracking-widest">149</span>
        </p>--}}
        <a href="{{ route('register') }}" class="button text-xl">
            Grab your license for only <span class="currency">$</span>149
        </a>
    </div>

    <div class="mt-12 | md:mt-0">
        <h3 class="markup-h2">
            Take the shortcut
        </h3>
        <p><span class="markup-baseline text-base">Mailcoach pre-installed on DigitalOcean</span> <i class="ml-1 fab fa-digital-ocean text-xl text-blue-500"></i></p>
        <div class="mt-4 text-lg">
            <p>
                Setting up a new server with Mailcoach is super easy. Check out our <a href="{{ route('1-click') }}" class="markup-link">1-Click Application</a> on the DigitalOcean Marketplace.
            </p>
        </div>

        <h3 class="mt-12 markup-h2">
            Pick a delivery service
        </h3>
        <div class="mt-4 text-lg">
            <p>
                Mailcoach can be configured with SMTP or one of the following affordable email services.
            </p>
        </div>
    </div>

    <ul class="md:start-2 grid cols-auto self-end justify-start md:cols-4 gap-1">
        <li>
            <a class="block button-white w-full rounded-r-none" href="https://aws.amazon.com/ses/" target="_blank">
                <img alt="Mailcoach can send newsletters via AWS" class="mx-auto my-1 h-6" src="/images/logos/aws.svg">
            </a>
        </li>
        <li>
            <a class="block button-white w-full rounded-none" href="https://mailgun.com" target="_blank">
                <img alt="Mailcoach can send newsletters via Mailgun" class="mx-auto my-1 h-6" src="/images/logos/mailgun.svg">
            </a>
        </li>
        <li>
            <a class="block button-white w-full rounded-l-none" href="https://postmarkapp.com" target="_blank">
                <img alt="Mailcoach can send newsletters via  Postmark" class="mx-auto my-1 h-6" src="/images/logos/postmark.svg">
            </a>
        </li>
        <li>
            <a class="block button-white w-full rounded-l-none" href="https://sendgrid.com" target="_blank">
                <img  alt="Mailcoach can send newsletters via Sendgrid" class="mx-auto my-1 h-6" src="/images/logos/sendgrid.svg">
            </a>
        </li>
    </ul>
</div>
