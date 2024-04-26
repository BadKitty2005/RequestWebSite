function changeCharacter(characterId) {
    var characters = document.querySelectorAll('[id^="character"]');
    characters.forEach(function(character) {
      character.style.display = 'none';
    });
    
    var selectedCharacter = document.getElementById('character' + characterId);
    if(selectedCharacter) {
      selectedCharacter.style.display = 'block';
    }
  }