<template>
    <div class="report-maps bg-gray-200 rounded-md">
        <l-map style="height: 350px" :zoom="zoom" :center="[
                location.lat || defaultLocation.lat,
                location.lng || defaultLocation.lng
              ]">
            <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
            <l-marker :lat-lng="markerLatLng"></l-marker>
        </l-map>
    </div>
</template>

<script>
import { LMap, LTileLayer, LMarker } from 'vue2-leaflet';
import 'leaflet/dist/leaflet.css';
export default {
    name: "LocationMap",
    props: {
        defaultLocation: {
            type: Object,
            default: () => ({
                lat: 8.9806,
                lng: 38.7578
            })
        }
    },
    components: {
        LMap,
        LTileLayer,
        LMarker,
    },
    data() {
        return {
            location: {},
            url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            attribution: "CarImageEdit",
            mapOptions: {
                zoomSnap: 0.5
            },
            zoom: 15
        };
    },
    computed: {
        markerLatLng() {
            return this.location ? this.location : this.defaultLocation;
        }
    },
    mounted() {
        this.getUserPosition();
    },
    methods: {
        getUserPosition() {
            if (!localStorage.getItem('location')) {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        pos => {
                            this.location = {
                                lat: pos.coords.latitude,
                                lng: pos.coords.longitude
                            };
                            localStorage.setItem('location', JSON.stringify(this.location));
                        },
                        error => {
                            console.log("Error in getting current user position", error);
                        },
                        {enableHighAccuracy: true}
                    );
                }
            } else {
                this.location = JSON.parse(localStorage.getItem('location'));
            }
        },
    }
}
</script>

<style scoped>
    .report-maps {
        height: 350px !important;
    }
</style>
