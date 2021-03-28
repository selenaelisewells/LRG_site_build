// SectionComponent
const OverviewComponent = {
    name: 'overview-component',
    data: () => {
        return {
            overview: {
                title: 'Overview',
                body: 'Officials play a vital role in the game, they are often described as the third team on the ice. The basic role of the on-ice officials can be broken down into two simple words – safe and fair. For a referee to view and officiate the game with these two words in mind, they should be able to call a game that is acceptable to all of the participants.',
                image: 'referee.jpg',
                tagline: 'Officials play a vital role in the game, they are often described as the third team on the ice.',
                alt_text: 'The Referee',
                id: 434,
                component_type: 'white',
                button_text: 'learn more',
                section_id: 'test2',
                is_overview: 1
            },
            path: ''
        }
    },

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
        <section class="overViewWrap" :id="'overview-'+overview.section_id">
            <div class="banner">
                <h2 class="bannerTitle">
                    {{overview.title}}
                </h2>
            </div>
            
                <div class="sectionText">                
                    <p class="text">
                        {{overview.body}}
                    </p>
                </div>
                
                <div class="Image">
                    <img :src='"./images/" + overview.image' 
                            :alt="overview.alt_text || overview.title">
                </div>               
                
          
        </section>       
    `
};

export default OverviewComponent;