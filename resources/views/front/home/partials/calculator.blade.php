<div class="grid">
    <header class="md:text-center">
        <h2 class="markup-h1">Pay less for email marketing</h2>
        <p class="markup-baseline">What is your average usage?</p>
    </header>

    <div
        class="mt-12 flex flex-col items-start md:items-center text-xl"
        x-data="{
            subscribers: 5000,
            campaigns: 12,
            format: number => new Intl.NumberFormat('en-US').format(Math.round(number)),
        }"
    >
        <p class="leading-loose">
            <span>I have</span>
            <br class="md:hidden">
            <span class="select shadow inline-block mr-2 | md:mx-2">
                <select @input="subscribers = parseInt($event.target.value)">
                    <option value="2000">2,000</option>
                    <option selected value="5000">5,000</option>
                    <option value="10000">10,000</option>
                    <option value="15000">15,000</option>
                    <option value="20000">20,000</option>
                    <option value="30000">30,000</option>
                    <option value="40000">40,000</option>
                    <option value="50000">50,000</option>
                    <option value="100000">100,000</option>
                </select>
                <span class="select-arrow"><i class="fas fa-angle-down text-green-500"></i></span>
            </span>
            <span>subscribers and send </span>
            <br class="md:hidden">
            <span class="select shadow inline-block mr-2 | md:mx-2">
                <select @input="campaigns = parseInt($event.target.value)">
                    <option value="6">6</option>
                    <option selected value="12">12</option>
                    <option value="24">24</option>
                    <option value="24">36</option>
                    <option value="24">48</option>
                </select>
                <span class="select-arrow"><i class="fas fa-angle-down text-green-500"></i></span>
            </span>
            <span>campaigns each year</span>
        </p>

        <div class="mt-3 pt-3 border-t-2 border-dotted border-dark-200">
            <p class="leading-loose">
                You'd pay
                <span class="mx-1 inline-flex items-center h-10 font-semibold bg-green-100 text-green-500 px-3 rounded-sm">
                    <span class="currency">$</span>
                    <span x-text="format(149 + 60 + 0.0001 * subscribers * campaigns)"></span>
                </span>
                <br class="md:hidden">
                and could save
                <span class="mx-1 inline-flex items-center h-10 font-semibold bg-green-100 text-green-500 px-3 rounded-sm">
                    <span class="currency">$</span>
                    <span
                        x-text="format(0.02 * subscribers * campaigns - 149 - 60 + 0.0001 * subscribers * campaigns)"></span>
                </span>
                every year
            </p>
        </div>
    </div>

    <div class="mt-12 text-xs opacity-75 md:text-center">
        <p>
            Estimated cost includes a license, DigitalOcean hosting & email delivery via Amazon SES.
        </p>
        <p>
            Savings are calculated using Mailcoach as alternative for Mailchimp (Pay As You Go).
        </p>
    </div>
</div>
