## Mars Rover (Case Study) Restful API

This project has builded with PHP Laravel 8 Framework

<b><h3>Requirements</h3></b>
Docker<br>
docker-compose<br>
git<br>

<b><h3>Installation</h3></b>
<pre>git clone https://github.com/krmckr61/marsRover.git</pre>
To build docker containers
<pre>./vendor/bin/sail up -d</pre>
To run tests
<pre>./vendor/bin/sail artisan test</pre>


<b><h3>Requests</h3></b>
base url : http://localhost/api/v1/
<table>
<thead>
<th>Request</th>
<th>Endpoint</th>
<th>Method</th>
<th>Body</th>
<th>Return</th>
</thead>
<tbody>
<tr>
<td>Create Plateue</td>
<td>plateau</td>
<td>POST</td>
<td>
<pre>
{
    "x": coordinate
    "y": coordinate
}
</pre>
</td>
<td>Plateau</td>
</tr>
<tr>
    <td>Get Plateaus</td>
    <td>plateau</td>
    <td>GET</td>
    <td></td>
    <td>PlateauCollection</td>
</tr>
<tr>
    <td>Get Plateau From Id</td>
    <td>plateau/{plateauId}</td>
    <td>GET</td>
    <td></td>
    <td>Plateau</td>
</tr>
<tr>
    <td>Create Rover</td>
    <td>rover</td>
    <td>POST</td>
    <td>
<pre>
{
    "plateau_id": plateau_id,
    "x": coordinate,
    "y": coordinate,
    "d": direction
}
</pre>
     </td>
    <td>Rover</td>
</tr>
<tr>
    <td>Get Rovers</td>
    <td>rover</td>
    <td>GET</td>
    <td></td>
    <td>RoverCollection</td>
</tr>
<tr>
    <td>Get Rover From Id</td>
    <td>rover/{roverId}</td>
    <td>GET</td>
    <td></td>
    <td>Rover</td>
</tr>
<tr>
    <td>Send Commands To Rovers</td>
    <td>rover/{roverId}</td>
    <td>POST</td>
<td>
<pre>
{
    "commands": commandlist
}
</pre>
</td>
    <td>RoverCollection</td>
</tr>
</tbody>
</table>


<b><h3>Parameters</h3></b>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Accepted Values</th>
<th>Example</th>
</tr>
</thead>
<tbody>
<tr>
<td>coordinate</td>
<td>decimal</td>
<td> (-1000, 1000)</td>
<td>-950.45654</td>
</tr>
<tr>
<td>direction</td>
<td>char</td>
<td> in ('W', 'N', 'E', 'S')</td>
<td> S</td>
</tr>
<tr>
<td>command</td>
<td>char</td>
<td> in ('L', 'R', 'M')</td>
<td>M</td>
</tr>
<tr>
<td>commandList</td>
<td>string</td>
<td> in ('L', 'R', 'M')</td>
<td>LMRLMRLMRLRLMRLMRLMRMLRMMMMMM</td>
</tr>
</tbody>
</table>

<b><h3>Partial View Examples</h3></b>
<b>Plateau</b>
<pre>
{
    "x": 100,
    "y": 999,
    "updated_at": "2021-09-11T10:28:15.000000Z",
    "created_at": "2021-09-11T10:28:15.000000Z",
    "id": 13
}
</pre>

<b>Rover</b>
<pre>
{
    "plateau_id": 2,
    "x": 124.67987,
    "y": -50.67987,
    "d": "N",
    "updated_at": "2021-09-11T10:28:35.000000Z",
    "created_at": "2021-09-11T10:28:35.000000Z",
    "id": 15
}
</pre>
