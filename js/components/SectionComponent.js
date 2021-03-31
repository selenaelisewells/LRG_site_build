// SectionComponent
const SectionComponent = {
    name: 'section-component',
    props: [
        'section'
    ],
    template: `
        <section :id="'section-'+section.section_id" 
                 :class="section.component_type === 'black' ? 'blackBanner bannerWrapper' : 'whiteBanner'" >
            <div class="banner">
                <h2 class="bannerTitle"> 
                    {{ section.title }}
                </h2>
            </div>
            <div class="sectionContent">
                <div class="Image" v-if="section.component_type === 'black'">
                    <img :src='"./images/" + section.image' 
                        :alt="section.alt_text || section.title">
                </div>
        
                <div class="sectionText">
                    <h3 class="tagline">{{ section.tagline }}</h3>
                    <p class="text" v-html="section.body"></p>                
                   
                    <a class="button" :href="section.button_link">{{section.button_text}}</a>
                </div>

                <div class="Image" v-if="section.component_type === 'white'">
                    <img :src='"./images/" + section.image' 
                        :alt="section.alt_text || section.title">
                </div>

            </div>
        </section>
    `
};

export default SectionComponent;