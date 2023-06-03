<form method="GET">
  <select class="color bgcolor" name="timeframe">
    <option selected disabled>時間帯 Time Frame</option>
    <option value="night">00:00:00 - 05:59:59</option>
    <option value="morning">06:00:00 - 11:59:59</option>
    <option value="afternoon">12:00:00 - 17:59:59</option>
    <option value="evening">18:00:00 - 23:59:59</option>
  </select>
  <hr/>
  <section>
    <label for="bgcolor">Background Color</label>
    <select class="color bgcolor" id="bgcolor"></select>
    <br/>
    <label for="color">Color</label>
    <select class="color bgcolor" id="color"></select>
    <hr/>
    <label for="fontSize">Font Size</label>
    <select class="color bgcolor" id="fontSize">
      <option value="13px">Small</option>
      <option value="16px" selected>Medium</option>
      <option value="20px">Large</option>
    </select>
  </section>
  <button class="color bgcolor" type="submit">GET</button>
</form>