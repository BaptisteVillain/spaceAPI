# Curiosity
<table>
	<tr>
		<td>
			Our project is based on the Mars Curiosity Rover.  We used an API to get the path of the Rover from the beginning of his mission until today and we drew it by cluster of 10 days.  
			With the data from the MAAS API (Mars Weather API), we compare the weather between Mars and Earth from the day selected.  
			With the data from the Mars Rover Photos API, we display all the photos taken by the front camera of the rover from the day we selected.  
			With the Tweeter API, we display tweets of the Curiosity tweeter account from the day we selected.
		</td>
	</tr>
</table>

## Screen
![Screen of the landing page](screenshot/screenLanding.png)
![Screen of the map](screenshot/screenMap.png)
![Screen of the 404](screenshot/screen404.png)
![Screen of the 505](screenshot/screen505.png)

## Features
- Routing
- Rewriting URL
- Cache avec base de données
- Comparaison de la météo entre Mars et la Terre en fonction du jour sélectionné et de la localisation du visiteur (limitée par l’API)
- Navigation à travers les jours (par 10 environ) via une timeline reliée à la map
- Affichage de point clé de son chemin tout les 10 jours environ avec des informations spécifiques à ce jour au survol
- Affichage des photos de Curiosity en fonction d’une période spécifique (Mars) 
- Affichage des tweets de Curiosity en fonction d’une période spécifique (Terre) 
- Lightbox pour profiter pleinement des photos
- Zoom pour profiter de la map
- Aucune dépendance externe
- Pas de librairie utilisée

## Demo
A live Demo is coming soon, stay in touch...

## Install locally
- npm install in terminal
- Connect in localhost with MAMP

### Bug

If you find a bug , open an issue [here](https://github.com/BaptisteVillain/spaceAPI/issues).

## Built with

- HTML
- CSS
- JS
- PHP


## Team

[![Antoine Turpin](https://avatars3.githubusercontent.com/u/17272009?v=3&s=400)](https://github.com/TurpinAntoine)|[![Baptiste Villain](https://avatars0.githubusercontent.com/u/17247097?v=3&s=400)](https://github.com/BaptisteVillain)|[![Lisa Fises](https://avatars2.githubusercontent.com/u/17248215?v=3&s=400)](https://github.com/lisafises)|[![Ugo Olsak](https://avatars2.githubusercontent.com/u/18398869?v=3&s=460)](https://github.com/ugolsk)|[![Loic Tuil](https://avatars1.githubusercontent.com/u/7509439?v=3&s=400)](https://github.com/loict88)

HETIC ©
