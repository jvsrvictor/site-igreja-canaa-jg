var nextPageT = '';
var prevPageT = '';
var pid = '';

function nextPage(){
	if (nextPageT != null){
		getVids(pid, nextPageT);
		
	}
}

function previousPage(){
	if (prevPageT != null){
		getVids(pid, prevPageT);
	}
}

function getVids(pid, pageT){
	$.get("https://www.googleapis.com/youtube/v3/playlistItems",{
		part: 'snippet',
		maxResults: '6',
		playlistId: pid,
		pageToken: pageT,
		key: 'AIzaSyAf_FQRMcvSJRlU3J1owOcfttc7rA2Vi1Y'},
			function(data){
				nextPageT = data.nextPageToken;
				prevPageT = data.prevPageToken;	

				if(nextPageT==null){
					document.getElementById("nextPage").disabled = true;
				}else{
					document.getElementById("nextPage").disabled = false;
				}

				if(prevPageT==null){
					document.getElementById("prevPage").disabled = true;
				}else{
					document.getElementById("prevPage").disabled = false;
				}

				$("#results").html("");
				$.each(data.items, function(i, item){
					console.log(item);
					videoId = item.snippet.resourceId.videoId;
					videoTitle = item.snippet.title;
					videoDescription = item.snippet.description;
					
					outputP2 = '<div class="container"><iframe src="https://www.youtube-nocookie.com/embed/' + videoId + '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
					outputFinal = '<section class="mensagensVideos">' + outputP2 + '</section>';
					
					$('#results').append(outputFinal);
					// $(outputFinal).insertAfter("#results");
				})
				
		}
	);
}


$(document).ready(function() {
	$.get(
		"https://www.googleapis.com/youtube/v3/channels",{
		part : 'contentDetails', 
		id : 'UCmcGE8PmjqQ2Ws4iXQte5ZQ', // You can get one from Advanced settings on YouTube
		key: 'AIzaSyAf_FQRMcvSJRlU3J1owOcfttc7rA2Vi1Y'},
			function(data) {
				$.each( data.items, function( i, item ) {
					console.log(item);
					pid = item.contentDetails.relatedPlaylists.uploads;
					document.getElementById("nextPage").disabled = false;
					document.getElementById("prevPage").disabled = true;
					getVids(pid, '');
			})
		}
  	);
});


