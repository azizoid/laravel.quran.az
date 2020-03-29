<template>
  <table class="table table-borderless table-sm">
    <thead class="table-dark">
      <tr>
        <td align="center" colspan="4">{{ location }}, {{ tarix }}</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td align="right">{{ prayers[0]['title']}}</td>
        <td>{{ prayers[0]['time'] }}</td>
        <td align="right">{{ prayers[1]['title']}}</td>
        <td>{{ prayers[1]['time'] }}</td>
      </tr>
      <tr>
        <td align="right">{{ prayers[2]['title']}}</td>
        <td>{{ prayers[2]['time'] }}</td>
        <td align="right">{{ prayers[3]['title']}}</td>
        <td>{{ prayers[3]['time'] }}</td>
      </tr>
      <tr>
        <td align="right">{{ prayers[4]['title']}}</td>
        <td>{{ prayers[4]['time'] }}</td>
        <td align="right">{{ prayers[5]['title']}}</td>
        <td>{{ prayers[5]['time'] }}</td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  props: ["prayers", "location", "tarix"]
};
</script>