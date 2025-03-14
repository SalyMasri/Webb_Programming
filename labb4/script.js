document.getElementById("part1_btn").addEventListener("click", function()
{
    window.location.href="index.php?part=1";
});

function buttonClicked(e)
{
    window.location.href += "&delete=" + e.id;
}