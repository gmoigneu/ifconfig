
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>What is my IP address? &mdash; {{ $host }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="What is my IP address?">
    <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/pure/0.6.2/pure-min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/pure/0.6.2/grids-responsive-min.css">
    <style>
      html, .pure-g [class *= "pure-u"] {
        font-family: "Open Sans", sans-serif;
      }
      pre {
        font-family: "Monaco", "Menlo", "Consolas", "Courier New", monospace;
      }
      body {
        margin-left: auto;
        margin-right: auto;
        max-width: 80%;
        margin-bottom: 20px;
      }
      .ip {
        border: 1px solid #cbcbcb;
        background: #f2f2f2;
        font-size: 36px;
        padding: 6px;
      }
    </style>
  </head>
  <body>
    <div class="pure-g">
      <div class="pure-u-1-1">
        <h1>What is my IP address?</h1>
        <p><code class="ip">{{ $lookup['ip'] }}</code></p>
        <p>Multiple command line HTTP clients are supported,
          including <a href="https://curl.haxx.se/">curl</a>, <a href="https://github.com/jkbrzt/httpie">httpie</a>, <a href="https://www.gnu.org/software/wget/">GNU
            Wget</a>
          and <a href="https://www.freebsd.org/cgi/man.cgi?fetch(1)">fetch</a>.</p>
      </div>
    </div>
    <div class="pure-g">
      <div class="pure-u-1 pure-u-md-1-2">
        <h2>CLI examples:</h2>
        <pre>
$ curl {{ $host }}
{{ $lookup['ip'] }}

$ http -b {{ $host }}
{{ $lookup['ip'] }}

$ wget -qO- {{ $host }}
{{ $lookup['ip'] }}

$ fetch -qo- https://{{ $host }}
{{ $lookup['ip'] }}</pre>

        <h2>Country lookup:</h2>
        <pre>
$ http {{ $host }}/country
{{ $lookup['country'] }}</pre>


        <h2>City lookup:</h2>
        <pre>
$ http {{ $host }}/city
{{ $lookup['city'] }}</pre>

      </div>
      <div class="pure-u-1 pure-u-md-1-2">
        <h2>JSON output:</h2>
        <pre>
$ http {{ $host }}/json
{ 
    "city": "{{ $lookup['city'] }}",
    "country": "{{ $lookup['country'] }}",
    "hostname": "{{ $lookup['hostname'] }}",
    "ip": "{{ $lookup['ip'] }}",
    "ip_decimal": {{ $lookup['ip_decimal']}}
}</pre>

        <p>Setting the Accept header to application/json also works.</p>
        <h2>Plain output:</h2>
        <p>Always returns the IP address including a trailing newline, regardless of user agent.</p>
        <pre>
$ http {{ $host }}/ip
{{ $lookup['ip'] }}</pre>

        <h2>Testing port connectivity:</h2>
        <pre>
$ http {{ $host }}/port/8080
{
    "ip": "{{ $lookup['ip'] }}",
    "port": 8080,
    "reachable": false
}</pre>

      </div>
      <div class="pure-u-1 pure-u-md-1-1">
        <h2>FAQ</h2>

        <h3>Is using this service from automated scripts/tools permitted?</h3>
        <p>Yes, as long as the rate limit is respected. <em>Please limit
        automated requests to 10 request per minute</em>. No guarantee is made
        for requests that exceed this limit. They may be rate-limited (with a
        429 response code) or dropped entirely.</p>

        <h3>Can I run my own service?</h3>
        <p>Yes, the source code (PHP - Lumen) is available on <a href="https://github.com/gmoigneu/ifconfig">GitHub</a>. For the original project, check the <a href="https://github.com/mpolden/ipd">mpolden/ipd</a> repository written by Martin Polden in Go.</p>
      </div>
    </div>
    <a href="https://github.com/gmoigneu/ifconfig" class="github-corner"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#151513; color:#fff; position: absolute; top: 0; border: 0; right: 0;"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>
  </body>
</html>
