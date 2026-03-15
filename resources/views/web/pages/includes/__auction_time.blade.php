
<div class="overly-content">
    <p class="day">00</p>
    <p>@lang('Days')</p>
</div>
<div class="overly-content">
    <p class="hour">00</p>
    <p>@lang('Hours')</p>
</div>
<div class="overly-content">
    <p class="minutes">00</p>
    <p>@lang('Minutes')</p>
</div>
<div class="overly-content">
    <p class="seconds">00</p>
    <p>@lang('Seconds')</p>
</div>


<script>
    var countDownDate_{{ $auction->id }} = new Date("{{ $auction->beginning_time }}").getTime();
    var x_{{ $auction->id }} = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate_{{ $auction->id }} - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown_{{ $auction->id }}").innerHTML =
            "<div class='overly-content'><p class='day'>" + days + "</p><p>@lang('Days')</p></div>" +
            "<div class='overly-content'><p class='hour'>" + hours + "</p><p>@lang('Hours')</p></div>" +
            "<div class='overly-content'><p class='minutes'>" + minutes + "</p><p>@lang('Minutes')</p></div>" +
            "<div class='overly-content'><p class='seconds'>" + seconds + "</p><p>@lang('Seconds')</p></div>";

        if (distance < 0) {
            clearInterval(x_{{ $auction->id }});
            document.getElementById("countdown_{{ $auction->id }}").innerHTML = '<p class="expired">{{ __("EXPIRED") }}</p>';
        }
    }, 1000);
</script>


