import SectionComponent from './SectionComponent.js';

// SectionsContainer
const SectionsContainer = {
    name: 'sections-container',
    components: {
        SectionComponent
    },
    data: () => {
        return {
            sections: [{
                    title: 'The Orange',
                    body: 'Officials play a vital role in the game, they are often described as the third team on the ice. The basic role of the on-ice officials can be broken down into two simple words – safe and fair. For a referee to view and officiate the game with these two words in mind, they should be able to call a game that is acceptable to all of the participants.',
                    image: 'referee.jpg',
                    tagline: 'Officials play a vital role in the game, they are often described as the third team on the ice.',
                    alt_text: 'The Referee',
                    id: 7,
                    component_type: 'white',
                    button_text: 'learn more',
                    section_id: 'test2'
                },
                {
                    title: 'The Potato',
                    body: 'Officials play a vital role in the game, they are often described as the third team on the ice. The basic role of the on-ice officials can be broken down into two simple words – safe and fair. For a referee to view and officiate the game with these two words in mind, they should be able to call a game that is acceptable to all of the participants.',
                    image: 'referee.jpg',
                    tagline: 'Officials play a vital role in the game, they are often described as the third team on the ice.',
                    alt_text: 'The Referee',
                    id: 9,
                    component_type: 'black',
                    button_text: 'learn more',
                    section_id: 'test'
                },
                {
                    title: 'The Orange',
                    body: 'Officials play a vital role in the game, they are often described as the third team on the ice. The basic role of the on-ice officials can be broken down into two simple words – safe and fair. For a referee to view and officiate the game with these two words in mind, they should be able to call a game that is acceptable to all of the participants.',
                    image: 'referee.jpg',
                    tagline: 'Officials play a vital role in the game, they are often described as the third team on the ice.',
                    alt_text: 'The Referee',
                    id: 7,
                    component_type: 'white',
                    button_text: 'learn more',
                    section_id: 'test2'
                },
                {
                    title: 'The Orange',
                    body: 'Officials play a vital role in the game, they are often described as the third team on the ice. The basic role of the on-ice officials can be broken down into two simple words – safe and fair. For a referee to view and officiate the game with these two words in mind, they should be able to call a game that is acceptable to all of the participants.',
                    image: 'referee.jpg',
                    tagline: 'Officials play a vital role in the game, they are often described as the third team on the ice.',
                    alt_text: 'The Referee',
                    id: 7,
                    component_type: 'black',
                    button_text: 'learn more',
                    section_id: 'test2'
                },


            ],
            path: ''
        }
    },
    // Called when the component is rendered on the webpage
    created() {
        // Splits the string into an array devided by '/'s
        const urlSegments = window.location.toString().split('/')
        this.path = urlSegments[urlSegments.length - 1];

        // Get our sections (REPLACE WITH ACTUAL API ROUTE)---- This depends on Elena
        // fetch(`/api/sections/${this.path}`)
        //     .then(res => res.json())
        //     .then(data => {
        //         this.sections = data;
        //     });
    },
    template: `
    <div>
        <section-component v-for="section in sections" :key="section.id" :section="section"></section-component>
    </div>
    `
}

// Export as module
export default SectionsContainer;