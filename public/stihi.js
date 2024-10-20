async function sendRequestWithoutParam()
{
let url = new URL('http://stihi/fromAjax.php');
}

async function sendRequestWithParam()// use fetch
{
let url = new URL('http://stihi/fromAjax.php');
url.searchParams.set([param1], [param2]);
let response = await fetch(url);
if (response.ok){
  let commits = await response.text();
  let paragraphElement = document.createElement("pre", "h5");
  let message = document.createTextNode(commits);
  paragraphElement.appendChild(message);
  document.body.append(paragraphElement);
}
else {
  alert (response.status);
}
} 