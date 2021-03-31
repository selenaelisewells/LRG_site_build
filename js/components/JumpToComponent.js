// SectionComponent
const jumpToComponent = {
    name: 'jump-to-component',
    props: [
        'jumpbutton'
    ],
    template: `
    <li class="linkButton">
        <a :href="jumpbutton.link">
            <div :style="styleObject" class="jumpbuttonImage"></div>
            <span class="btnTitle">{{jumpbutton.title}}</span>
        </a>
    </li>

    `,
    computed: {
        // Inspired by this SO post: https://stackoverflow.com/questions/46551925/vuejs-v-bindstyle-hover
        styleObject() {
            return {
                '--background-image': "url('../images/jumpbuttons/" + this.jumpbutton.image + "')",
                '--background-image-hover': "url('../images/jumpbuttons/" + this.jumpbutton.hoverImage + "')"
            }
        }
    }
};

export default jumpToComponent;