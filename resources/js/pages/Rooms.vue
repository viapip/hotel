<template>

    <header class="header" style="background: url('./img/rooms/banner.jpg') center/cover no-repeat">
        <div class="container">
            <div class="header__wrapper">
                <h1>Rooms</h1>
                <div class="breadcrumb">
                    <a href="#" class="breadcrumb__item">Home</a>
                    <a href="#" class="breadcrumb__item">Rooms</a>
                </div>
            </div>
        </div>
        <a href="#" class="button-blur">Book Now</a>
    </header>

    <main>
        <section>
            <div class="container container--sm">
                <div class="room">
                    <div class="room__overtitle">
                        Room Only
                    </div>
                    <h3>Single room</h3>
                    <img src="img/rooms/room.jpg" alt="">
                    <div class="room__description">
                        <span>8 sq.m.</span>
                        <span>1 Single Bed (Extra beds are not available for this room)</span>
                    </div>
                    <div class="room-features">
                        <div class="room-features__title">Room Features:</div>
                        <ul class="room-features__ul">
                            <li class="room-features__li">Non smoking rooms</li>
                            <li class="room-features__li">Ironing facilities</li>
                            <li class="room-features__li">Separate shower and tub</li>
                            <li class="room-features__li">Hair dryer</li>
                            <li class="room-features__li">Television LCD/plasma screen</li>
                            <li class="room-features__li">Satellite/cable TV</li>
                        </ul>
                    </div>
                    <div class="room__bottom">
                        <a href="#" class="button">Book Now</a>
                    </div>
                </div>
                <div class="room">
                    <div class="room__overtitle">
                        Room Only
                    </div>
                    <h3>Double room</h3>
                    <img src="img/rooms/room.jpg" alt="">
                    <div class="room__description">
                        <span>8 sq.m.</span>
                        <span>1 Single Bed (Extra beds are not available for this room)</span>
                    </div>
                    <div class="room-features">
                        <div class="room-features__title">Room Features:</div>
                        <ul class="room-features__ul">
                            <li class="room-features__li">Non smoking rooms</li>
                            <li class="room-features__li">Ironing facilities</li>
                            <li class="room-features__li">Ironing facilities</li>
                            <li class="room-features__li">Ironing facilities</li>
                            <li class="room-features__li">Separate shower and tub</li>
                            <li class="room-features__li">Hair dryer</li>
                            <li class="room-features__li">Hair dryer</li>
                            <li class="room-features__li">Television LCD/plasma screen</li>
                            <li class="room-features__li">Satellite/cable TV</li>
                        </ul>
                    </div>
                    <div class="room__bottom">
                        <a href="#" class="button">Book Now</a>
                        <div class="room__price">
                            <span>RATES FROM</span>
                            £ 95.00
                        </div>
                    </div>
                </div>
                <div class="room">
                    <div class="room__overtitle">
                        Room Only
                    </div>
                    <h3>Family</h3>
                    <img src="img/rooms/room.jpg" alt="">
                    <div class="room__description">
                        <span>8 sq.m.</span>
                        <span>1 Single Bed (Extra beds are not available for this room)</span>
                    </div>
                    <div class="room-features">
                        <div class="room-features__title">Room Features:</div>
                        <ul class="room-features__ul">
                            <li class="room-features__li">Non smoking rooms</li>
                            <li class="room-features__li">Ironing facilities</li>
                            <li class="room-features__li">Ironing facilities</li>
                            <li class="room-features__li">Ironing facilities</li>
                            <li class="room-features__li">Separate shower and tub</li>
                            <li class="room-features__li">Hair dryer</li>
                            <li class="room-features__li">Television LCD/plasma screen</li>
                            <li class="room-features__li">Satellite/cable TV</li>
                        </ul>
                    </div>
                    <div class="room__bottom">
                        <a href="#" class="button">Book Now</a>
                        <div class="room__price">
                            <span>RATES FROM</span>
                            £ 95.00
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <DiscoverSlider/>
    </main>

</template>

<script>
import DiscoverSlider from "../components/DiscoverSlider";
export default {
    name: "Rooms",
    components: {DiscoverSlider}
}
</script>

<style scoped>

</style>
