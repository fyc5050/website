<template>
    <Layout>
        <Container class="my-16">
            <div class="text-center mb-16">
                <h1 class="text-3xl font-display font-bold tracking-tight text-white sm:text-4xl md:text-5xl">
                    About us
                </h1>

                <p class="mx-auto mt-3 font-display max-w-md text-base text-gray-500 sm:text-lg md:mt-5 md:max-w-3xl md:text-xl">
                    Find out who we are
                </p>
            </div>

            <div class="space-y-12">
                <Member name="Martijn van Dijk" function="Chair" :des-count="props.desCounts['Martijn van Dijk'] ?? 0" image="https://images.gewis.nl/4d/5c5fe4413382798e35f3b774a64e6fc66c4d13.jpeg?w=1920&h=1080&fm=webp&q=80&s=f9cff60c21e6f1e3266f12020c00be1f">
                    <template #text>
                        Hello, I am Martijn van Dijk, the Chair of 50/50. I'm from Tilburg in the Netherlands and I am taking the Bachelor Applied Mathematics. As official Chairman of this FYC I am responsible for getting everyone chairs but also for leading meetings and making the agenda, which has been going pretty smoothly so far (apart from some minor errors in the agenda, I don't have a lot of experience with LaTeX yet).
                        In my free time I like to participate in the events at GEWIS, such as the weekly “borrel”, where I will gladly do a chugging competition with anyone who challenges me. As if I don’t have enough to do yet I am also a part of the climbing association ESAC. But the best thing that I am a part of is of course 50/50, (2023's best FYC).
                    </template>
                </Member>

                <Member name="Willem Schinck" function="Secretary" :des-count="props.desCounts['Willem Schinck'] ?? 0" image="https://images.gewis.nl/c3/fbbfa02b57305da091e882deb000316154dede.jpeg?w=1920&h=1278&fm=webp&q=80&s=4026bbc5e6ea8c3922f13725261c8050" reverse-layout>
                    <template #text>
                        Hello, I am Willem, but most people call me WUM, the secretary of 50/50. That means I write all the emails and if nobody is late I need to make the minutes. I am originally from Limburg, but unfortunately I lost my accent so I speak mostly ABN. I now live in Nuenen with my girlfriend Femke and my best friend Lars. My music preference is Rammstein and other musicians who wear black. Even though I am the oldest, my height doesn’t represent this. I make a lot of jokes about Hiske’s accent and I feel really bad about these. So if you hear me make these kind of jokes, please tell me to stop. I hope to see you at the weekly borrels! Goodbye
                    </template>
                </Member>

                <Member name="Stijn Schroijen" function="Treasurer" :des-count="props.desCounts['Stijn Schroijen'] ?? 0" image="https://images.gewis.nl/97/75fa62938a6255781a1744be618d9fdee9250c.jpeg?w=1920&h=1278&fm=webp&q=80&s=156eac93b6c234ac7764cd18844aace6">
                    <template #text>
                        I am Stijn Schroijen. I study computer science. My role in the FYC is treasurer. I have to admit, this is a really hard job for me as a non-mathematician but weirdly enough they trust me in doing so. On top of that I’m also the official ‘schronselmeister’ a.k.a. foodmeister. This sounds very cool, but I’m basically the butler of the FYC. If the other members are hungry, I have to bring food to the meeting. If they are thirsty I have to make the tea/coffee. I also bring all the beers. Due to this I’m very often at GEWIS, because who else will take care of them? You will also see me a lot at the borrels. I looooveeee beer. I will use this all the time as an excuse to lose at beerpong. Chugging beer is just so much fun, and I don’t want to flex or anything but I’m veryyyy good at it as well... Therefore you may always challenge me in a chugging contest!
                        XOXO Stijn
                    </template>
                </Member>

                <Member name="Arend Roijakkers" function="Vice-chair" :des-count="props.desCounts['Arend Roijakkers'] ?? 0" reverse-layout image="https://images.gewis.nl/11/04523875208c3939c53351b151ee179597b7de.jpeg?w=1920&h=1278&fm=webp&q=80&s=0ad3717f28aa3d211244451675e2abf9">
                    <template #text>
                        Hi guys, I am Arend Roijakkers, the Merchmeister of 50/50. I am from some place around Gorinchem, but moved to Eindhoven for my study computer science. The fact that I am the Merchmeister means that I spend a lot of time designing the beautiful merch for the fyc, that means the logo, hoodies, stickers and a lot more items to come, I will make sure you see our logo everywhere. But if only the logo is not enough of me, you can also see me at gewis quite often, we drink coffee there almost every break, and i will try to join as many borrels and parties as possible, but if you see me don’t offer me a beer, I don’t drink cause I am a bit scared of the fact that alcohol slows down the thinking mind. But talk to me about music instead, I have a spotify playlist that’s over 300 hours, containing my favorite artists Rammstein and gladde paling. So enough to talk about, see you then.
                    </template>
                </Member>

                <Member name="Mex de Loo" function="Webmeister" :des-count="props.desCounts['Mex de Loo'] ?? 0" image="https://images.gewis.nl/0d/1ba18a91512b1128ce7ece1c65b9d3b7e03e15.jpeg?w=1920&h=1278&fm=webp&q=80&s=ef28e0c27e000f97435ed1450a4c126d">
                    <template #text>
                        I am 5050’s one and only webmeister alongside Sandor. Which means I’m in charge of designing and running our amazing website on which you are reading this. The creation of this website was very easy and not at all time consuming, so that’s really good. If you have any queries about the website just let me know. Anyways enough about the website, I study computer science, which I only choose because I thought applied math would be too hard for me. I am from Limburg, so unfortunately I don’t understand people half the time. I only recently turned 17, so for all the ladies you have to wait another year 😉. Because I am 17, I have never drank any alcohol, but in a years’ time I get to try it for the first time. I am really excited about that and can’t wait to try it! Much love 5050’s webmeister.
                    </template>
                </Member>

                <Member name="Hiske Kolner" function="Mascotte-meister" :des-count="props.desCounts['Hiske Kolner'] ?? 0" reverse-layout image="https://images.gewis.nl/df/064fba6c4f7feb250b8a6d7d9245ba8478872c.jpeg?w=1920&h=1278&fm=webp&q=80&s=7b534ae07bf60ece8e6f853c0b981403">
                    <template #text>
                        Hi everyone, my name is Hiske (pronounced “HiskUUHHH”) and I study computer science and engineering. My main role within FYC 50/50 is musicmeister. This means I get to “choose” the music we play at meetings and other gatherings, we decided that I should be the one to do this because my taste in music is so different from everyone else that I can’t be biased. If you have already spoken with me on one of the social drinks at Gewis that I like to attend, the first thing you discovered about me must have been that I am from the far far east of the Netherlands. I was very Lucky to get a room in Eindhoven, so I don’t have to go through hell all the way back home after each day. The other members of 50/50 love to make fun of my accent, but I have to agree it can be very noticeable. After meeting me it won’t take long until you will see me eat a Dutch delicacy. I like it so much that I invented the name Plakkoek for it. You really should try it, at least 427 times. One of the other things I have to do for our FYC, is to always find someone to take a group picture of us when we attend a social drink or other event. You can often find me at GEWIS during the  lunch breaks when we go to drink some coffee. Well… actually I am one of the only members that prefers tea over coffee. But come say HI to me either way, because I really love to meet new people!
                    </template>
                </Member>

                <Member name="Sandor van Wieringen" function="Webmeister" :des-count="props.desCounts['Sandor van Wieringen'] ?? 0" image="https://images.gewis.nl/62/bec34dc444a51a70cd08417452339122e1a521.jpeg?w=1920&h=1440&fm=webp&q=80&s=600c9f987187f84e695206ae5b55a2db">
                    <template #text>
                        Hi, my name is Sandor van Wieringen, but annoyingly my friends often call me Simon, since Mex once forgot my name, thought it was Simon, and it stuck. I am 18 years old, and come from the beautiful city of Utrecht, somewhere in the middle of the Netherlands.
                        In my free time I play the electric guitar, inspired by legends such as Slash and Jimi Hendrix. I am a bit of a 'Slash Slut', one might say.
                        Now I am in my first year of Computer Science and Engineering, and I'm really enjoying the program up until now! I'm also glad to have found such a lovely group of friends in our fyc, 50/50.
                        Talking about 50/50, in our committee I am one of the two webmeisters, together with Mex. We make sure the website is running in all it's glory, and all necessary information is easily accessible! But most importantly, I am the zeurmeister, loosely translated to the complaintmeister. I am responsible for having critique on anything and everything, and do so with pride. People do often tell me I am very annoying in doing this, and I must agree.

                        But that's about all for me! I hope to see you all at ours or GEWIS' future activities, so come and say hi if you see me 😘
                    </template>
                </Member>

                <Member name="Annemiek van der Heijden" function="Instafluencer" :des-count="props.desCounts['Annemiek van der Heijden'] ?? 0" reverse-layout image="https://images.gewis.nl/6c/e2a4ff3884fcab937a915469050ff8c32011b6.jpeg?w=1920&h=1278&fm=webp&q=80&s=a32431e0f13a8ef032a8b4a209e0a521">
                    <template #text>
                        Hi, my name is Annemiek. I study applied mathematics (which is basically a simplified version of computer science). I’ve recently turned 21, which officially made me the grandma of the group 👵🏻. I live in a small town near Bergen op Zoom, but thankfully I found a place to stay near Eindhoven so I don’t have to travel 14 hours a day. Because of my mathematical background, I oversee managing the Instagram for our FYC. This job includes posting pictures of us together at activities but also making sure that other FYCs know that we’re on top. I love motorcycling and travelling to beautiful places such as Switzerland, Paris, Denmark and more. I also like going out with friends. I am at GEWIS almost every day, mostly during the breaks to drink coffee, but also for the borrels.  If you see me at a borrel, please don’t offer me any drinks. My parents are not a fan of drinking; hence I’ve never had a sip of alcohol in my life.
                    </template>
                </Member>

                <Member name="Sjaak Eck" function="Puntmeister" :des-count="props.desCounts['Sjaak Eck'] ?? 0" image="https://images.gewis.nl/26/8d76bcb30174f3ac09604a660422e824ee35c2.jpeg?w=1920&h=1278&fm=webp&q=80&s=6b65c49c546edcd59a09c2bd314a521c">
                    <template #text>
                        Hi everyone I am Sjaak Eck, I am the manager of the points of 50/50, which means I keep track of the points 50/50 has earned and keep an eye out for activities that we could do to earn points. I am currently studying Applied Mathematics and enjoying my hard studies. In my free time I like to study, nah jk, I like playing football, I play for a local football club, which I really enjoy. I also spend way too much time playing video games, currently I am playing F1 22, but I’m not that good yet. I like drinking tea during our breaks and you can see me at GEWIS sometimes. I am excited to see more people be excited for our activities as FYC 50/50 and I hope to see more of you at activities with GEWIS.
                    </template>
                </Member>
            </div>
        </Container>
    </Layout>
</template>

<script lang="ts" setup>
import Layout from "../components/layout/Layout.vue";
import Container from "../components/Container.vue";
import Member from "../components/about-us/Member.vue";

const props = defineProps<{
    desCounts: Record<string, number>;
}>();
</script>
