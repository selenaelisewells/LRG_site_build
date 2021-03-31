import jumpToComponent from './JumpToComponent.js';

const jumpToContainer = {
    name: 'jump-to-container',
    components: {
        jumpToComponent
    },
    data: () => {
        return {
            jumpbuttons: [{
                    title: 'Minor Hockey',
                    link: '#section-minorHockey',
                    image: 'MINORHOCKEY.svg',
                    hoverImage: 'ACTIVE_MINORHOCKEY.svg'
                },
                {
                    title: 'Sledge Hockey',
                    link: '#section-sledgeHockey',
                    image: 'SLEDGEHOCKEY.svg',
                    hoverImage: 'ACTIVE_SLEDGEHOCKEY.svg'
                },
                {
                    title: 'Recreational Hockey',
                    link: '#section-recreationalHockey',
                    image: 'RECHOCKEY.svg',
                    hoverImage: 'ACTIVE_RECHOCKEY.svg'

                },
                {
                    title: 'Hockey Tournaments',
                    link: '#section-tournaments',
                    image: 'TOURNAMENTS.svg',
                    hoverImage: 'ACTIVE_TOURNAMENTS.svg'

                },
                {
                    title: 'London Hockey',
                    link: '#section-regularSeason',
                    image: 'CITYOFLONDON.svg',
                    hoverImage: 'ACTIVE_CITYOFLONDON.svg'
                },
                {
                    title: 'Seasonal Hockey',
                    link: '#section-winterSpringSummer',
                    image: 'SEASONS.svg',
                    hoverImage: 'ACTIVE_SEASONS.svg'

                }

            ]
        }
    },
    template: `
  
    <div class="jumpToButtonsWrap">
        <ul class="jumpToButtonsList">
        <jump-to-component v-for="jumpbutton in jumpbuttons" :key="jumpbutton.link" :jumpbutton="jumpbutton"></jump-to-component>
        </ul>
    </div>

    `
}

export default jumpToContainer;